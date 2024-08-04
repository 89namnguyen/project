<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model 
{
    protected $table = 'category';
    public $timestamps = false;
    protected $fillable = ['name'];

    // quan hệ 1-n -> trả về mảng => duyeentj danh sách
    public function products() {
        return $this->hasMany(Product::class, 'category_id','id');
    }
}