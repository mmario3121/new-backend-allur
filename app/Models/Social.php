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

    protected $appends = ['image_url'];
    protected $fillable = ['title', 'title_kz', 'text', 'text_kz', 'image', 'type'];

    protected $hidden = ['updated_at', 'created_at'];


    public function getImageUrlAttribute(): string|null
    {
        return $this->image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image) : null;
    }

}
