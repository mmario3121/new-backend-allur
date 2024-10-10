<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class CareraBanner extends Model
{
    protected $guarded = false;

    const CACHE_TIME = 60 * 60 * 24;
    const IMAGE_PATH = 'images/carera_banners';

    protected $appends = ['image_url'];

    protected $fillable = ['image', 'title', 'title_kz', 'text', 'text_kz'];

    protected $hidden = ['updated_at', 'created_at'];

    public function getImageUrlAttribute(): string|null
    {
        return $this->image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image) : null;
    }
}
