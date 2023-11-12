<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\multi_img;

class multi_img extends Model
{
    use HasFactory;
    protected $guarded= [];

    function Product(){

        return $this->hasMany(Product::class);
    }//end method


}
