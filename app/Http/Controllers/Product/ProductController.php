<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function createProduct(){


        $brands= Brand::get();
        $categories= Category::latest()->get();
       
        return view('admin.product.createproduct',compact('brands','categories'));
    }//end method


    function allProduct(){
        return view('admin.product.allproduct');
    }//end method
}
