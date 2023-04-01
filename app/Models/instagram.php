<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instagram extends Model
{
    use HasFactory;
    protected $table='instagram';
    protected $fillable = [
    'title','description', 'image','date', 'status'
    ];
}
