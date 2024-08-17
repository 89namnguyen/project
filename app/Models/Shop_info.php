<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop_info extends Model
{
    use HasFactory;
    protected $table = 'shop_info';
    public $timestamps = false;
    protected $fillable = ['name','logo','email','address','phone','map','date','level'];
    // quan hệ 1-1
    public function h_open() {
        return $this->hasMany(H_open::class, 'shop_id','id');
    }
}
