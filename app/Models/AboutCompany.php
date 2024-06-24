<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AboutCompany extends Model
{
    use HasFactory;

    protected $guarded = false;

    const CACHE_TIME = 60 * 60 * 24;
    const IMAGE_PATH = 'images/finance_pages';

     //block1 - title, text, image
            //block2 - title, text, image
            //block3 - title, text, image, card1, card2
            //block4 - title, text, image
            //block5 - title, text, image
            //block6 - title, text, image
    protected $appends = ['block1_image_url', 'block2_image_url', 'block3_image_url', 'block4_image_url', 'block5_image_url', 'block6_image_url'];  
    protected $fillable = ['block1_title', 'block1_text', 'block1_image', 'block2_title', 'block2_text', 'block2_image', 'block3_title', 'block3_text', 'block3_image', 'block3_card1', 'block3_card2', 'block4_title', 'block4_text', 'block4_image', 'block5_title', 'block5_text', 'block5_image', 'block6_title', 'block6_text', 'block6_image',
    'block1_title_kz', 'block1_text_kz', 'block2_title_kz', 'block2_text_kz', 'block3_title_kz', 'block3_text_kz', 'block3_card1_kz', 'block3_card2_kz', 'block4_title_kz', 'block4_text_kz', 'block5_title_kz', 'block5_text_kz', 'block6_title_kz', 'block6_text_kz'
];

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
}
