<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name','buying_price','selling_price','discount','available_qty','category_id','brand_id','model_id','descriptions','status_id'];
}
