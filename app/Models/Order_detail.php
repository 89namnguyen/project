<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model 
{
    protected $table = 'order_detail';
    public $timestamps = false;
    protected $fillable = ['order_id','product_id','quantity','price'];

    // quan hệ 1-n -> trả về mảng => duyeentj danh sách
    public function products() {
        return $this->hasOne(Product::class, 'id','product_id');
    }
    public function Order() {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }
}