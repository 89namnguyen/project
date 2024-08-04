<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    public $timestamps = false;
    protected $fillable = ['name','price','sale_price','category_id','description','image'];
    // quan hệ 1-1
    public function cat() {
        return $this->hasOne(Category::class, 'id','category_id');
    }
    public function Order_detail() {
        return $this->hasMany(Order_detail::class, 'product_id', 'id');
    }
}
