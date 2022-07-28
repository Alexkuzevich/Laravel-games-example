<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'description',
      'slug',
      'preview_image',
      'position',
      'video',
      'novelty',
      'status'
    ];
}