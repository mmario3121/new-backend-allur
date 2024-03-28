<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class WorldCategory extends Model
{
    use HasFactory;

    protected $guarded = false;

    const IMAGE_PATH = 'images/world-categories';

    protected $fillable = ['image', 'image_mob', 'title', 'title_kz', 'slug', 'cover_photo', 'main_page_image'];

    protected $hidden = ['updated_at', 'created_at'];

    public function getImageUrlAttribute(): string|null
    {
        return $this->image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image) : null;
    }

    public function getImageMobUrlAttribute(): string|null
    {
        return $this->image_mob ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image_mob) : null;
    }

    public function getCoverPhotoUrlAttribute(): string|null
    {
        return $this->cover_photo ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->cover_photo) : null;
    }

    public function getMainPageImageUrlAttribute(): string|null
    {
        return $this->main_page_image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->main_page_image) : null;
    }
}
