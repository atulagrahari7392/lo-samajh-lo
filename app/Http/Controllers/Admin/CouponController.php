<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index() { $coupons = Coupon::latest()->paginate(15); return view('admin.coupons.index', compact('coupons')); }
    public function create() { return view('admin.coupons.create'); }
    public function store(Request $request) { return redirect()->route('admin.coupons.index')->with('success','Coupon created!'); }
    public function show(Coupon $coupon) { return view('admin.coupons.show', compact('coupon')); }
    public function edit(Coupon $coupon) { return view('admin.coupons.edit', compact('coupon')); }
    public function update(Request $request, Coupon $coupon) { $coupon->update($request->except('_token','_method')); return redirect()->route('admin.coupons.index')->with('success','Coupon updated!'); }
    public function destroy(Coupon $coupon) { $coupon->delete(); return redirect()->route('admin.coupons.index')->with('success','Coupon deleted.'); }
}
