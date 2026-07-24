<?php

namespace App\Services\Payment;

use Illuminate\Support\Facades\App;

class PaymentService
{
    protected $provider;

    public function __construct(string $gateway = 'razorpay')
    {
        // Resolve provider dynamically based on config or parameter
        if ($gateway === 'phonepe') {
            $this->provider = App::make(PhonePeProvider::class);
        } else {
            $this->provider = App::make(RazorpayProvider::class);
        }
    }

    public function initiatePayment(float $amount, string $orderId, array $metadata = []): array
    {
        return $this->provider->createOrder($amount, $orderId, $metadata);
    }

    public function verifyCallback(array $payload): bool
    {
        return $this->provider->verifyPayment($payload);
    }

    public function processRefund(string $paymentId, ?float $amount = null): array
    {
        return $this->provider->refund($paymentId, $amount);
    }
}
