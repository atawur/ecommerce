<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','buying_price','selling_price','discount',
    'available_qty','category_id','brand_id','model_id','descriptions','status_id'];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function model(){
        return $this->belongsTo(ProductModel::class);
    }

    public function category(){
        return $this->belongsTo(ProductCategory::class);
    }
}