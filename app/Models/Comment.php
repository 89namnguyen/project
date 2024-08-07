<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model 
{
    protected $table = 'comment';
    public $timestamps = false;
    protected $fillable = ['customer_id','content','date','status'];

    // quan hệ 1-n -> trả về mảng => duyeentj danh sách
    public function customer() {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
    public function feedback() {
        return $this->hasMany(Feedback::class, 'comment_id', 'id');
    }
}