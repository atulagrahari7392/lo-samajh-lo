<?php

namespace App\Services\Payment;

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Illuminate\Support\Facades\Log;

/**
 * Razorpay Payment Provider
 *
 * Handles order creation, payment verification, and refunds via Razorpay API.
 */
class RazorpayProvider implements PaymentProviderInterface
{
    private Api $api;

    public function __construct()
    {
        $this->api = new Api(
            config('services.razorpay.key_id'),
            config('services.razorpay.key_secret')
        );
    }

    /** {@inheritdoc} */
    public function createOrder(float $amount, string $currency = 'INR', array $options = []): array
    {
        try {
            $order = $this->api->order->create([
                'amount'          => (int) ($amount * 100), // Razorpay expects paise
                'currency'        => $currency,
                'receipt'         => $options['receipt'] ?? 'rcpt_' . uniqid(),
                'notes'           => $options['notes'] ?? [],
                'partial_payment' => false,
            ]);

            return [
                'success'          => true,
                'gateway_order_id' => $order->id,
                'amount'           => $amount,
                'currency'         => $currency,
                'key_id'           => config('services.razorpay.key_id'),
                'order_data'       => $order->toArray(),
            ];
        } catch (\Exception $e) {
            Log::error('Razorpay createOrder failed', ['error' => $e->getMessage()]);

            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    /** {@inheritdoc} */
    public function verifyPayment(string $gatewayOrderId, string $gatewayPaymentId, string $signature): bool
    {
        try {
            $this->api->utility->verifyPaymentSignature([
                'razorpay_order_id'   => $gatewayOrderId,
                'razorpay_payment_id' => $gatewayPaymentId,
                'razorpay_signature'  => $signature,
            ]);

            return true;
        } catch (SignatureVerificationError $e) {
            Log::warning('Razorpay signature verification failed', [
                'order_id'   => $gatewayOrderId,
                'payment_id' => $gatewayPaymentId,
                'error'      => $e->getMessage(),
            ]);

            return false;
        }
    }

    /** {@inheritdoc} */
    public function refund(string $gatewayPaymentId, float $amount, array $options = []): array
    {
        try {
            $refund = $this->api->payment->fetch($gatewayPaymentId)->refund([
                'amount' => (int) ($amount * 100),
                'notes'  => $options['notes'] ?? [],
                'speed'  => $options['speed'] ?? 'normal',
            ]);

            return [
                'success'   => true,
                'refund_id' => $refund->id,
                'amount'    => $amount,
                'status'    => $refund->status,
            ];
        } catch (\Exception $e) {
            Log::error('Razorpay refund failed', ['payment_id' => $gatewayPaymentId, 'error' => $e->getMessage()]);

            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    /** {@inheritdoc} */
    public function getPaymentDetails(string $gatewayPaymentId): array
    {
        try {
            $payment = $this->api->payment->fetch($gatewayPaymentId);

            return [
                'id'             => $payment->id,
                'amount'         => $payment->amount / 100,
                'currency'       => $payment->currency,
                'status'         => $payment->status,
                'method'         => $payment->method,
                'captured'       => $payment->captured,
                'description'    => $payment->description,
                'email'          => $payment->email,
                'contact'        => $payment->contact,
                'created_at'     => $payment->created_at,
            ];
        } catch (\Exception $e) {
            Log::error('Razorpay getPaymentDetails failed', ['error' => $e->getMessage()]);

            return [];
        }
    }

    /** {@inheritdoc} */
    public function getGatewayName(): string
    {
        return 'razorpay';
    }

    /**
     * Verify Razorpay webhook signature.
     */
    public function verifyWebhookSignature(string $body, string $signature): bool
    {
        try {
            $this->api->utility->verifyWebhookSignature(
                $body,
                $signature,
                config('services.razorpay.webhook_secret')
            );

            return true;
        } catch (SignatureVerificationError $e) {
            Log::warning('Razorpay webhook signature failed', ['error' => $e->getMessage()]);

            return false;
        }
    }
}
