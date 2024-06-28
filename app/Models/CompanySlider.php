<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CompanySlider extends Model
{
    use HasFactory;

    protected $guarded = false;

    const CACHE_TIME = 60 * 60 * 24;
    const IMAGE_PATH = 'images/company-sliders';

    protected $appends = ['image_url', 'image_mob_url'];

    protected $fillable = ['image', 'position', 'image_mob', 'title', 'title_kz'];

    protected $hidden = ['updated_at', 'created_at'];

    public function getImageUrlAttribute(): string|null
    {
        return $this->image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image) : null;
    }

    public function getImageMobUrlAttribute(): string|null
    {
        return $this->image_mob ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image_mob) : null;
    }
}
