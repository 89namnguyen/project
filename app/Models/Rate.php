<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model 
{
    protected $table = 'rating';
    public $timestamps = false;
    protected $fillable = ['product_id','customer_id','rate','content','date'];

    // quan hệ 1-n -> trả về mảng => duyeentj danh sách
    public function customer() {
        return $this->hasOne(Customer::class, 'id','customer_id');
    }
    public function product() {
        return $this->hasOne(product::class, 'id', 'product_id');
    }
}