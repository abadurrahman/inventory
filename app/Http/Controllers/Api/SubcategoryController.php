<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subcategory;
use DB;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategory=Subcategory::all();
        //$category=DB::table('categories')->get();
        return response()->json($subcategory);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
         'subcategory_name' => 'required|unique:subcategories|max:255',
        ]);

           $subcategory = new Subcategory;
           $subcategory->subcategory_name = $request->subcategory_name;
           $subcategory->save();

           //query builder
           // $data=array();
           // $data['category_name']=$request->category_name;
           // DB::table('categories')->insert($data);
    }

     public function show($id)
    {
       //query builder
        //$categoru=DB::table('categories')->where('id',$id)->first();
        $subcategory=Subcategory::findorfail($id);
         return response()->json($subcategory);
    }


     public function update(Request $request, $id)
    {
        $data=array();
        $data['subcategory_name']=$request->subcategory_name;
        DB::table('subcategories')->where('id',$id)->update($data);
        // $category=Category::findorfail($id);
        // $category->save();
    }

    public function destroy($id)
    {
        DB::table('subcategories')->where('id',$id)->delete();
        // $category=Category::findorfail($id);
        // $category->delete();
    }
}
