<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Image;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        $product=Product::all();
        //$category=DB::table('categories')->get();
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $data=array();
    	$data['product_name']=$request->product_name;
    	$data['product_code']=$request->product_code;
    	$data['product_quantity']=$request->product_quantity;
    	$data['category_id']=$request->category_id;
    	$data['subcategory_id']=$request->subcategory_id;
    	$data['brand_id']=$request->brand_id;
    	$data['product_size']=$request->product_size;
    	$data['product_color']=$request->product_color;
    	$data['selling_price']=$request->selling_price;
    	$data['product_details']=$request->product_details;
    	$data['video_link']=$request->video_link;
    	$data['newarrivals_one']=$request->newarrivals_one;
    	$data['newarrivals_two']=$request->newarrivals_two;
    	$data['newarrivals_three']=$request->newarrivals_three;
    	$data['newarrivals_four']=$request->newarrivals_four;
    	$data['newarrivals_five']=$request->newarrivals_five;
    	$data['latest_design']=$request->latest_design;
        $data['special_offer']=$request->special_offer;
        $data['collection']=$request->collection;
    	$data['status']=1;


    	$image_one=$request->image_one;
        $image_one_1=$request->image_one_1;
    	$image_two=$request->image_two;
    	$image_three=$request->image_three;
        $image_four=$request->image_four;

    if($image_one && $image_one_1 && $image_two && $image_three && $image_four){
            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(230,300)
                ->save('public/product/'.$image_one_name);
                $data['image_one']='public/product/'.$image_one_name;

            $image_one_1_name= hexdec(uniqid()).'.'.$image_one_1->getClientOriginalExtension();
                Image::make($image_one_1)->resize(230,300)->save('public/product/'.$image_one_1_name);
                $data['image_one_1']='public/product/'.$image_one_1_name;   

            $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(230,300)->save('public/product/'.$image_two_name);
                $data['image_two']='public/product/'.$image_two_name; 

            $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                Image::make($image_three)->resize(230,300)->save('public/product/'.$image_three_name);
                $data['image_three']='public/product/'.$image_three_name; 

            $image_four_name= hexdec(uniqid()).'.'.$image_four->getClientOriginalExtension();
                Image::make($image_four)->resize(230,300)->save('public/product/'.$image_four_name);
                $data['image_four']='public/product/'.$image_four_name;    
                
                $product=DB::table('products')
                          ->insert($data);
                    
        }
   
    }
}
