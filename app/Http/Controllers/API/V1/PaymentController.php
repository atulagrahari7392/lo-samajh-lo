<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Payment\PaymentService;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function createOrder(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'amount' => 'required|numeric|min:1'
        ]);

        $orderId = 'LSL_ORDER_' . time() . '_' . auth()->id();
        
        $orderData = $this->paymentService->initiatePayment($request->amount, $orderId, [
            'course_id' => $request->course_id,
            'user_id' => auth()->id()
        ]);

        return response()->json([
            'success' => true,
            'order' => $orderData
        ]);
    }

    public function verifyPayment(Request $request)
    {
        $isValid = $this->paymentService->verifyCallback($request->all());

        if ($isValid) {
            // Fulfill order, enroll user
            return response()->json(['success' => true, 'message' => 'Payment successful.']);
        }

        return response()->json(['success' => false, 'message' => 'Invalid signature.'], 400);
    }
}
