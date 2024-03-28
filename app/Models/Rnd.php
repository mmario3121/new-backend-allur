<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Rnd extends Model
{
    use HasFactory;
    const IMAGE_PATH = 'images/rnds';

    protected $appends = ['section3_image_url', 'section3_banner_url'];
    protected $fillable = [
        'section1',
        'section2',
        'section3_image',
        'section3_banner',
        'section3_text',
    ];

    public function getSection3ImageUrlAttribute(): string|null
    {
        return $this->section3_image ? Storage::disk('custom')->url($this->section3_image) : null;
    }

    public function getSection3BannerUrlAttribute(): string|null
    {
        return $this->section3_banner ? Storage::disk('custom')->url($this->section3_banner) : null;
    }
}
