<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainPageBanner extends Model
{
    use HasFactory;

    const IMAGE_PATH = 'images/main_page_banners';

    protected $guarded = false;

    protected $fillable = ['image', 'title', 'title_kz', 'description', 'description_kz', 'link', 'model_id'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . self::IMAGE_PATH . '/' . $this->image) : null;
    }
}
