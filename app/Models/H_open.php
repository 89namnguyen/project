<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class H_open extends Model 
{
    protected $table = 'h_open';
    public $timestamps = false;
    protected $fillable = ['shop_id','day','time_open','time_close'];

}