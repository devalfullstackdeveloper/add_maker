<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;
    protected $table='socialmeadia';
    protected $fillable = [
        'media_title','media_description', 'media_link','media_thumbnail'
    ];
}
