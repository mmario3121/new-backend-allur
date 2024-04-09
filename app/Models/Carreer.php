<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Carreer extends Model
{
    use HasFactory;

    protected $guarded = false;

    const CACHE_TIME = 60 * 60 * 24;
    const IMAGE_PATH = 'images/carreers';
    protected $appends = ['block1_image_url', 'block2_image_url', 'block3_image_url', 'block4_image_url', 'block5_image_url', 'block6_image_url', 'block7_image_url', 'block8_image_url', 'block9_image_url', 'block10_image_url'];
    protected $fillable = ['block1_title', 'block1_text', 'block1_image', 'block2_title', 'block2_text', 'block2_image', 'block3_title', 'block3_text', 'block3_image', 'block4_title', 'block4_text', 'block4_image', 'block5_title', 'block5_text', 'block5_image', 'block6_title', 'block6_text', 'block6_image', 'block7_title', 'block7_text', 'block7_image', 'block8_title', 'block8_text', 'block8_image', 'block9_title', 'block9_text', 'block9_image', 'block10_title', 'block10_text', 'block10_image', 'card1_title', 'card1_text', 'card2_title', 'card2_text', 'card3_title', 'card3_text', 'card4_title', 'card4_text'];

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

    public function getBlock5ImageUrlAttribute(): string|null
    {
        return $this->block5_image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->block5_image) : null;
    }

    public function getBlock6ImageUrlAttribute(): string|null
    {
        return $this->block6_image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->block6_image) : null;
    }

    public function getBlock7ImageUrlAttribute(): string|null
    {
        return $this->block7_image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->block7_image) : null;
    }

    public function getBlock8ImageUrlAttribute(): string|null
    {
        return $this->block8_image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->block8_image) : null;
    }

    public function getBlock9ImageUrlAttribute(): string|null
    {
        return $this->block9_image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->block9_image) : null;
    }

    public function getBlock10ImageUrlAttribute(): string|null
    {
        return $this->block10_image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->block10_image) : null;
    }
}
