<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class About extends Authenticatable
{
    use HasFactory;
    protected $table = 'about';
    public $timestamps = false;
    protected $fillable = ['title','content','image','link','status'];
   
}
