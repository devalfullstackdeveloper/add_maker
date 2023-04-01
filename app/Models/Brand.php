<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table='brand';
    protected $fillable = [
        'name', 'contact','address','website','tagline','services','display_media','brand_icon'
    ];

}
