<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class SubCategory extends Model
{
    use HasFactory;

    protected $guarded= [];



    function Category(){

        return $this->belongsTo(Category::class);
    }//end method




    function Product(){

        return $this->belongsTo(Product::class);
    }


}
