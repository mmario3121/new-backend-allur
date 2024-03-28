<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class ModelSectionItem extends Model
{
    use HasFactory;

    const IMAGE_PATH = 'images/model-section-item';
    protected $appends = ['image_url'];
    protected $fillable = ['section_id', 'price', 'title', 'title_kz', 'title_id', 'text', 'text_kz'];

    public function getImageUrlAttribute(): string|null
    {
        return $this->image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image) : null;
    }
}
