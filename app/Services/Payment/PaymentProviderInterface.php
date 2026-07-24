<?php

namespace App\Services\Payment;

interface PaymentProviderInterface
{
    /**
     * Create a payment order on the gateway.
     *
     * @param  float   $amount    Amount in INR
     * @param  string  $currency  Currency code (default: INR)
     * @param  array   $options   Additional options (receipt, notes, etc.)
     * @return array   ['success', 'gateway_order_id', 'amount', 'currency', 'key_id', ...]
     */
    public function createOrder(float $amount, string $currency = 'INR', array $options = []): array;

    /**
     * Verify a payment signature/status from the gateway.
     *
     * @param  string  $gatewayOrderId    The order ID from the gateway
     * @param  string  $gatewayPaymentId  The payment ID from the gateway
     * @param  string  $signature         The signature/checksum to verify
     * @return bool
     */
    public function verifyPayment(string $gatewayOrderId, string $gatewayPaymentId, string $signature): bool;

    /**
     * Initiate a refund for a payment.
     *
     * @param  string  $gatewayPaymentId  The original payment ID
     * @param  float   $amount            Refund amount (partial or full)
     * @param  array   $options           Additional options
     * @return array   ['success', 'refund_id', 'amount', 'status']
     */
    public function refund(string $gatewayPaymentId, float $amount, array $options = []): array;

    /**
     * Fetch payment details from the gateway.
     *
     * @param  string  $gatewayPaymentId
     * @return array
     */
    public function getPaymentDetails(string $gatewayPaymentId): array;

    /**
     * Get the gateway identifier name.
     */
    public function getGatewayName(): string;
}
