<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model 
{
    protected $table = 'feedback';
    public $timestamps = false;
    protected $fillable = ['comment_id','customer_id','content','date','status'];

    // quan hệ 1-n -> trả về mảng => duyeentj danh sách
    public function customer() {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
    public function comment() {
        return $this->hasOne(Comment::class, 'id', 'comment_id');
    }
}