<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class RndAchievement extends Model
{
    use HasFactory;

    const IMAGE_PATH = 'images/rnd-achievements';

    protected $appends = ['image_url'];

    protected $fillable = [
        'image',
        'text',
        'text_kz',
        'position',
    ];

    public function getImageUrlAttribute(): string|null
    {
        return $this->image ? Storage::disk('custom')->url($this->image) : null;
    }
}
