<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class twitter extends Model
{
    use HasFactory;
    protected $table='twitter';
    protected $fillable = [
        'title','description', 'image','date', 'status'
    ];
}
