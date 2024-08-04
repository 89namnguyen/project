<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model 
{
    protected $table = 'customer';
    public $timestamps = false;
    protected $fillable = ['name','email','phone','password','address','status'];

    // quan hệ 1-n -> trả về mảng => duyeentj danh sách
    public function orders() {
        return $this->hasMany(Order::class, 'customer_id','id');
    }
}