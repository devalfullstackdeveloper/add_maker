<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    use HasFactory;
    protected $table='poster';
    protected $fillable = [
        'poster_name','description', 'poster_img','poster_date', 'status'
    ];
}
