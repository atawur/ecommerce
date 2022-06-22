<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = "product_models";
    protected $fillable = ['name','status_id','brand_id'];
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
}
