<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    use HasFactory;

    protected $guarded = false;

    const CACHE_TIME = 60 * 60 * 24;
    const IMAGE_PATH = 'images/banners';

    protected $appends = ['image_url', 'image_kz_url'];

    protected $fillable = ['image', 'image_kz', 'title', 'title_kz', 'slug'];

    protected $hidden = ['updated_at', 'created_at'];

    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image) : null;
    }

    public function getImageKzUrlAttribute()
    {
        return $this->image_kz ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image_kz) : null;
    }
}
