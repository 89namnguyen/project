<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model 
{
    protected $table = 'orders';
    public $timestamps = false;
    protected $fillable = ['name','email','phone','customer_id','address','status','date','order_note'];

    // quan hệ 1-n -> trả về mảng => duyeentj danh sách
    public function customer() {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
    public function Order_detail() {
        return $this->hasMany(Order_detail::class, 'order_id', 'id');
    }
}