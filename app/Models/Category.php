<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;

class Category extends Model
{
    use HasFactory;
    
    protected $guarded= [];


    function SubCategory(){

        return $this->hasMany(SubCategory::class);
    }



}
