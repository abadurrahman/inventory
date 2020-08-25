<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coupon;
use DB;

class CouponController extends Controller
{
    public function index()
    {
        $coupon=Coupon::all();
        //$category=DB::table('categories')->get();
        return response()->json($coupon);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
         'coupon_name' => 'required|unique:coupons|max:255',
         'discount' => 'required|unique:coupons|max:255',
        ]);

           $coupon = new Coupon;
           $coupon->coupon_name = $request->coupon_name;
           $coupon->discount = $request->discount;
           $coupon->save();

           //query builder
           // $data=array();
           // $data['category_name']=$request->category_name;
           // DB::table('categories')->insert($data);
    }

    public function show($id)
    {
       //query builder
        //$categoru=DB::table('categories')->where('id',$id)->first();
        $coupon=Coupon::findorfail($id);
         return response()->json($coupon);
    }


     public function update(Request $request, $id)
    {
        $data=array();
        $data['coupon_name']=$request->coupon_name;
        $data['discount']=$request->discount;
        DB::table('coupons')->where('id',$id)->update($data);
        // $category=Category::findorfail($id);
        // $category->save();
    }

    public function destroy($id)
    {
        DB::table('coupons')->where('id',$id)->delete();
        // $category=Category::findorfail($id);
        // $category->delete();
    }
}
