<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class UpcomingEvents extends Model
{
    use HasFactory;
    protected $table='upcomingevents';
    protected $fillable = [
        'title','description', 'icon','date', 'status'
    ];
}