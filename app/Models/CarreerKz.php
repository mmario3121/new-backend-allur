<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CarreerKz extends Model
{
    use HasFactory;

    protected $guarded = false;

    const CACHE_TIME = 60 * 60 * 24;
    const IMAGE_PATH = 'images/carreers';
    protected $fillable = [
        'block1_title_kz', 'block1_text_kz',
        'block2_title_kz', 'block2_text_kz',
        'block3_title_kz', 'block3_text_kz',
        'block4_title_kz', 'block4_text_kz',
        'block5_title_kz', 'block5_text_kz',
        'block6_title_kz', 'block6_text_kz',
        'block7_title_kz', 'block7_text_kz',
        'block8_title_kz', 'block8_text_kz',
        'block9_title_kz', 'block9_text_kz',
        'block10_title_kz', 'block10_text_kz',
        'card1_title_kz', 'card1_text_kz',
        'card2_title_kz', 'card2_text_kz',
        'card3_title_kz', 'card3_text_kz',
        'card4_title_kz', 'card4_text_kz',
    ];

    protected $hidden = ['updated_at', 'created_at'];
}
