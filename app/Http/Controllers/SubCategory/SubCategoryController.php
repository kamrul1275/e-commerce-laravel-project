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
        'name' => 'required',
        'category_id' => 'required',
        'mytextarea' => 'required',
    ]);

    $subcategories = new SubCategory();
    $subcategories->name= $request->name;
    //dd($request->name);
    $subcategories->category_id= $request->category_id;
    $subcategories->description= $request->mytextarea; 

    $subcategories->save();
  //dd($subcategories);
    return redirect(route('all.subcategory'));
}


}
