<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Industry extends Model
{
    use HasFactory;
    
    protected $table='industry';
    protected $fillable = [
        'industry_type','id','description', 'industry_image'
    ];
}
