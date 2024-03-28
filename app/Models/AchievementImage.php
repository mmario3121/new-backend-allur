<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AchievementImage extends Model
{
    use HasFactory;

    //fillable
    protected $guarded = false;

    protected $appends = ['image_url'];

    const CACHE_TIME = 60 * 60 * 24;
    const IMAGE_PATH = 'images/achievement-images';
    public function achievement()
    {
        return $this->belongsTo(Achievement::class);
    }
    public function getImageUrlAttribute(): string|null
    {
        return $this->image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image) : null;
    }
}
