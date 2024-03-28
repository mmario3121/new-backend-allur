<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class ModelSection extends Model
{
    use HasFactory;

    const IMAGE_PATH = 'images/model-section';
    protected $appends = ['image_url'];

    protected $fillable= ['model_id', 'title', 'image'];

    public function getImageUrlAttribute(): string|null
    {
        return $this->image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image) : null;
    }

}
