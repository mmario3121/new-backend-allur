<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Komek extends Model
{
    use HasFactory;
    protected $guarded = false;

    const CACHE_TIME = 60 * 60 * 24;
    const IMAGE_PATH = 'images/komeks';

    protected $fillable = ['title', 'title_kz', 'text', 'text_kz', 'image', 'form_image', 'card1', 'card2', 'card3', 'card4', 'card5', 'card6', 'list'];

    protected $appends = ['image_url', 'form_image_url'];

    protected $hidden = ['updated_at', 'created_at'];


    public function getImageUrlAttribute(): string|null
    {
        return $this->image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image) : null;
    }

    public function getFormImageUrlAttribute(): string|null
    {
        return $this->form_image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->form_image) : null;
    }
}
