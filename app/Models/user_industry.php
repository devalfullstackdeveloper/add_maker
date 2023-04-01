<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_industry extends Model
{
       use HasFactory;
        protected $table='user_industry';
      protected $fillable = [
        'userid',
        'industry_id',
        'description',
    ];
}
