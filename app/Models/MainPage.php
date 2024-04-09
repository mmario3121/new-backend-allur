<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MainPage extends Model
{
    use HasFactory;
    protected $guarded = false;

    const CACHE_TIME = 60 * 60 * 24;
    const IMAGE_PATH = 'images/main_page';

    protected $appends = ['video_url', 'finance_photo_url', 'career_photo1_url', 'career_photo2_url', 'career_photo3_url', 'consultation_photo_url', 'production_image_url'];

    protected $fillable = ['video', 'finance_title', 'finance_title_kz', 'finance_photo', 'career_title', 'career_title_kz', 'career_text', 'career_text_kz', 'career_photo1', 'career_photo2',  'career_photo3', 'consultation_photo', 'production_title', 'production_title_kz', 'production_description', 'production_description_kz', 'production_image', 'production_subtitle', 'production_subtitle_kz'];

    protected $hidden = ['updated_at', 'created_at'];

    public function getVideoUrlAttribute(): string|null
    {
        return $this->video ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->video) : null;
    }

    public function getFinancePhotoUrlAttribute(): string|null
    {
        return $this->finance_photo ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->finance_photo) : null;
    }

    public function getCareerPhoto1UrlAttribute(): string|null
    {
        return $this->career_photo1 ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->career_photo1) : null;
    }

    public function getCareerPhoto2UrlAttribute(): string|null
    {
        return $this->career_photo2 ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->career_photo2) : null;
    }

    public function getCareerPhoto3UrlAttribute(): string|null
    {
        return $this->career_photo3 ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->career_photo3) : null;
    }

    public function getConsultationPhotoUrlAttribute(): string|null
    {
        return $this->consultation_photo ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->consultation_photo) : null;
    }

    public function getProductionImageUrlAttribute(): string|null
    {
        return $this->production_image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->production_image) : null;
    }
}
