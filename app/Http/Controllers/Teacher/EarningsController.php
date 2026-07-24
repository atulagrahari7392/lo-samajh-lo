<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Payment;

class EarningsController extends Controller
{
    public function index()
    {
        $payments = Payment::whereHas('order.course', fn($q)=>$q->where('teacher_id',auth()->id()))->where('status','success')->latest()->paginate(15);
        $total    = $payments->sum('amount') / 100;
        return view('teacher.earnings.index', compact('payments','total'));
    }
}
