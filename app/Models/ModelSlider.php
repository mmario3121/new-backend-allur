<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ModelSlider extends Model
{
    use HasFactory;
    const IMAGE_PATH = 'images/model-sliders';

    protected $appends = ['image_url'];

    protected $fillable = ['model_id','position', 'image', 'section'];

    public function getImageUrlAttribute(): string|null
    {
        return $this->image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image) : null;
    }
}
