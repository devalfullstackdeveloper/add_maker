<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
class userlogin extends Model
{
    use HasFactory,HasApiTokens;
    protected $table='userlogin';
    protected $fillable = ['mobile_no', 'otp',];

}
