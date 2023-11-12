<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\multi_img;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];


    function Brand(){

        return $this->hasMany(Brand::class);
    }//end method


    function Category(){

        return $this->hasMany(Category::class);
    }//end method



    function SubCategory(){

        return $this->hasMany(SubCategory::class);
     }//end method


    //  multi image

    function MultiImage(){

        return $this->belongsTo(multi_img::class);
     }//end method



}
