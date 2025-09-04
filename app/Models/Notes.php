<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class notes extends Model
{
    use HasFactory;

     protected $fillable = ['title', 'content'];

     public function User(){

        $this->hasOne('App\Models\User','id','user_id');

     }
}
