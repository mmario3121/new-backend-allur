<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class ModelColor extends Model
{
    use HasFactory;

    const IMAGE_PATH = 'images/model-colors';
    protected $appends = ['image_url', 'hex_url'];

    protected $fillable = ['model_id', 'hex','title','title_kz', 'bitrix_id','position', 'image'];

    public function getImageUrlAttribute(): string|null
    {
        return $this->image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image) : null;
    }

    public function getHexUrlAttribute(): string|null
    {
        return $this->hex ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->hex) : null;
    }
}
