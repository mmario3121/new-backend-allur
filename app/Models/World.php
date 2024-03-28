<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class world extends Model
{
    use HasFactory;

    const IMAGE_PATH = 'images/worlds';

    protected $fillable = [
        'worldcategory_id',
        'title',
        'year',
        'description',
        'image',
        'title_kz',
        'description_kz',
    ];

    public function wordcategory()
    {
        return $this->belongsTo(wordcategory::class);
    }

    public function getImageUrlAttribute(): string|null
    {
        return $this->image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image) : null;
    }
}
