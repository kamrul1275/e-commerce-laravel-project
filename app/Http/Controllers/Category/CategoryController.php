<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    function createCategory(){

        return view('admin.category.createCategory');
    }// end method


    function allCategory(){

         $categories= Category::get();
         
        return view('admin.category.allCategory',compact('categories'));
    }// end method


    function storeCategory(Request $request){

        $validated = $request->validate([
            'name' => 'required|unique:categories',
            'mytextarea' => 'required',
        ]);

        $categories = new Category();
        $categories->name= $request->name;
        $categories->description= $request->mytextarea;

        $categories->save();
      //dd($categories);
        return redirect(route('all.category'))->with('msg','category added successfully');
    }// end method

    



}
