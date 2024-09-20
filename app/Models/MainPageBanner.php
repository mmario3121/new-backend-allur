<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainPageBanner extends Model
{
    use HasFactory;

    const IMAGE_PATH = 'images/main_page_banners';

    protected $guarded = false;

    protected $fillable = ['image', 'title', 'title_kz', 'description', 'description_kz', 'link', 'model_id', 'mobile_image'];

    protected $appends = ['image_url', 'mobile_image_url'];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('uploads/' . self::IMAGE_PATH . '/' . $this->image) : null;
    }

    public function getMobileImageUrlAttribute()
    {
        return $this->mobile_image ? asset('uploads/' . self::IMAGE_PATH . '/' . $this->mobile_image) : null;
    }
}
