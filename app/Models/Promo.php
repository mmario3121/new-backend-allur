<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Promo extends Model
{
    use HasFactory;
    const IMAGE_PATH = 'images/promos';

    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
        'title_kz',
        'description_kz',
        'title2',
        'description2',
        'image2',
        'title2_kz',
        'description2_kz',
        'has_form'
    ];

    protected $appends = ['image_url', 'image2_url'];

    public function getImageUrlAttribute(): string|null
    {
        return $this->image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image) : null;
    }

    public function getImage2UrlAttribute(): string|null
    {
        return $this->image2 ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image2) : null;
    }
}
