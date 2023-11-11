<?php

namespace App\Http\Controllers\SubCategory;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    function createSubCategory(){

        $categories= Category::get();

        return view('admin.subcategory.createsubCategory',compact('categories'));
    }


    function allSubCategory(){


      $Subcategories= SubCategory::get();
        return view('admin.subcategory.allsubCategory',compact('Subcategories'));
    }

function storeSubCategory(Request $request){

    $validated = $request->validate([
        'subcategory_name' => 'required',
        'category_id' => 'required',
    ]);


    SubCategory::insert([
        'subcategory_name' => $request->subcategory_name,
        'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)),
        'category_id' =>$request->category_id,
    ]);

    //dd($save_url);

   $notification = array(
        'message' => 'SubCategory Inserted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.subcategory')->with($notification); 
}




// ajax part

   function GetSubCategory($category_id){
    $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
    //dd($subcat);
        return json_encode($subcat);

}// End Method 








}
