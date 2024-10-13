<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    protected $guarded = false;

    const CACHE_TIME = 60 * 60 * 24;
    const IMAGE_PATH = 'images/sliders';

    protected $appends = ['image_url', 'image_mob_url', 'link_url', 'image_kz_url', 'image_mob_kz_url'];

    protected $fillable = ['image', 'link', 'position', 'image_mob', 'image_kz', 'image_mob_kz', 'title', 'title_kz'];

    protected $hidden = ['updated_at', 'created_at'];

    public function getImageUrlAttribute(): string|null
    {
        return $this->image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image) : null;
    }

    public function getImageMobUrlAttribute(): string|null
    {
        return $this->image_mob ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image_mob) : null;
    }

    public function getImageKzUrlAttribute(): string|null
    {
        return $this->image_kz ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image_kz) : null;
    }
    //ImageMobKz
    public function getImageMobKzUrlAttribute(): string|null
    {
        return $this->image_mob_kz ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image_mob_kz) : null;
    }
}
