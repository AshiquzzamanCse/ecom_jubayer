<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    //All Coupon
    public function AllCoupon()
    {
        $coupon = coupon::latest()->get();
        return view('admin.pages.coupon.all_coupon',compact('coupon'));
    }

    //Add Coupon
    public function AddCoupon()
    {
        return view('admin.pages.coupon.add_coupon');
    }

    //Store Coupon
    public function StoreCoupon(Request $request)
    {

        coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => now(),
        ]);

        $notification = array(
            'message' => 'Coupon Added Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.coupon')->with($notification);
    }

    //Edit Coupon
    public function EditCoupon($id)
    {
        $editcoupon = coupon::find($id);
        return view('admin.pages.coupon.edit_coupon',compact('editcoupon'));
    }

    //Update Coupon
    public function UpdateCoupon(Request $request)
    {
        $uid = $request->id;

        coupon::find($uid)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
        ]);

        $notification = array(
            'message' => 'Coupon Update Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.coupon')->with($notification);
    }

    //Delete Coupon
    public function DeleteCoupon($id)
    {

        coupon::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Coupon Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
