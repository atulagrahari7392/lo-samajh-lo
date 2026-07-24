<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Course;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function checkout(Request $request, $course_id)
    {
        $course = Course::findOrFail($course_id);
        return view('payment.checkout', compact('course'));
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'course_id' => 'required|exists:courses,id'
        ]);

        $coupon = Coupon::where('code', $request->code)->first();
        
        if (!$coupon || !$coupon->isValid()) {
            return response()->json(['success' => false, 'message' => 'Invalid or expired coupon.']);
        }

        return response()->json([
            'success' => true,
            'discount' => $coupon->value,
            'type' => $coupon->type,
        ]);
    }

    public function createOrder(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'billing_name' => 'required|string',
            'billing_email' => 'required|email',
            'billing_phone' => 'required|string',
        ]);

        $course = Course::findOrFail($request->course_id);
        $user = Auth::user();

        // Calculate totals
        $subtotal = $course->price ?? 0;
        $discount = 0; // calculate based on applied coupon
        $tax = 0; // calculate tax
        $total = $subtotal - $discount + $tax;

        $order = Order::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'tax' => $tax,
            'total' => $total,
            'billing_name' => $request->billing_name,
            'billing_email' => $request->billing_email,
            'billing_phone' => $request->billing_phone,
            'invoice_number' => 'INV-' . strtoupper(Str::random(10)),
        ]);

        // Integrate Razorpay/PhonePe order creation here
        
        return redirect()->route('payment.gateway', ['order' => $order->id]);
    }

    public function verifyPayment(Request $request)
    {
        // Verify payment signature from Gateway
        return redirect()->route('dashboard')->with('success', 'Payment successful.');
    }

    public function phonePeInitiate(Request $request)
    {
        // PhonePe initiate logic
    }

    public function phonePeCallback(Request $request)
    {
        // PhonePe callback logic
    }

    public function invoice(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('payment.invoice', compact('order'));
    }
}
