<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
    use HasFactory;

    const IMAGE_PATH = 'images/car-types';

    protected $fillable = ['title', 'title_kz'];
}
