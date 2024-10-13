<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FinancePage extends Model
{
    use HasFactory;

    protected $guarded = false;

    const CACHE_TIME = 60 * 60 * 24;
    const IMAGE_PATH = 'images/finance_pages';

    protected $appends = ['image_url', 'block2_image_url', 'form_image_url'];
    protected $fillable = ['title', 'image', 'text', 'card1_title', 'card1_text', 'card2_title', 'card2_text', 'card3_title', 'card3_text', 'card4_title', 'card4_text', 'card5_title', 'card5_text', 'card5_subtitle', 'card6_title', 'card6_text', 'card6_subtitle', 'card7_title', 'card7_text', 'card7_subtitle', 'card8_title', 'card8_text', 'card8_subtitle', 'card9_title', 'card9_text', 'card9_subtitle', 'block2_image', 'mini_card_5', 'mini_card_6', 'mini_card_7', 'mini_card_8', 'mini_card_9'];

    protected $hidden = ['updated_at', 'created_at'];

    public function getImageUrlAttribute(): string|null
    {
        return $this->image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image) : null;
    }

    public function getBlock2ImageUrlAttribute(): string|null
    {
        return $this->block2_image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->block2_image) : null;
    }

    public function getFormImageUrlAttribute(): string|null
    {
        return $this->form_image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->form_image) : null;
    }
}
