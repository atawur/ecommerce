<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
use App\Models\ProductModel;
use App\Models\ProductCategory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name','buying_price','selling_price','discount','available_qty','category_id','brand_id','model_id','descriptions','status_id'];


    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function model(){
        //alternate
        //return $this->belongsTo(ProductModel::class);
        return $this->belongsTo(ProductModel::class,'model_id','id');
    }

    public function category(){
        return $this->belongsTo(ProductCategory::class);
    }
}
