<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Social extends Model
{
    use HasFactory;

    protected $guarded = false;

    const CACHE_TIME = 60 * 60 * 24;
    const IMAGE_PATH = 'images/socials';

    protected $appends = ['block1_image_url', 'block2_image_url', 'block3_image_url', 'block4_image_url'];
    protected $fillable = ['block1_title', 'block1_image', 'block1_text', 'block2_title', 'block2_image', 'block2_text', 'block3_title', 'block3_image', 'block3_text', 'block4_title', 'block4_image', 'block4_text'];

    protected $hidden = ['updated_at', 'created_at'];


    public function getBlock1ImageUrlAttribute(): string|null
    {
        return $this->block1_image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->block1_image) : null;
    }

    
    public function getBlock2ImageUrlAttribute(): string|null
    {
        return $this->block2_image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->block2_image) : null;
    }


    public function getBlock3ImageUrlAttribute(): string|null
    {
        return $this->block3_image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->block3_image) : null;
    }


    public function getBlock4ImageUrlAttribute(): string|null
    {
        return $this->block4_image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->block4_image) : null;
    }

}
