<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';
    public $timestamps = false;
    protected $fillable = ['title','induction','image_title','customer_id','content','image','date','view'];
    // quan hệ 1-1
    public function custom() {
        return $this->hasOne(Customer::class, 'id','customer_id');
    }
}
