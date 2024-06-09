<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BrandPage extends Model
{
    use HasFactory;
    protected $guarded = false;

    const CACHE_TIME = 60 * 60 * 24;

    protected $fillable = ['title', 'description', 'image', 'brand_id'];

    const IMAGE_PATH = 'images/brand_pages';

    protected $appends = ['image_url'];

    protected $hidden = ['updated_at', 'created_at'];

    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image) : null;
    }
}
