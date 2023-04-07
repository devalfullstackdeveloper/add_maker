<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllPosts extends Model
{
    use HasFactory;
    protected $table='all_posts';
    protected $fillable = [
      'name','industry_type', 'description', 'image','thumbnail','caption', 'start_date','end_date', 'status'];
}
