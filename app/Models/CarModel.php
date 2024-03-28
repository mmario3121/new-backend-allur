<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class CarModel extends Model
{
    use HasFactory;

    const IMAGE_PATH = 'images/car-models';
    protected $appends = ['logo_url', 'video_url', 'price_list_url', 'document_url'];

    protected $fillable = ['type_id', 'slug', 'title', 'title_kz', 'logo', 'video', 'price_list', 'document', 'bitrix_id', 'is_active'];

    public function type(): HasOne
    {
        return $this->hasOne(CarType::class, 'id', 'type_id');
    }

    public function libraries()
    {
        return $this->hasMany(Library::class, 'model_id', 'id');
    }


    public function getLogoUrlAttribute(): string|null
    {
        return $this->logo ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->logo) : null;
    }
    public function getVideoUrlAttribute(): string|null
    {
        return $this->video ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->video) : null;
    }
    public function getPriceListUrlAttribute(): string|null
    {
        return $this->price_list ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->price_list) : null;
    }
    public function getDocumentUrlAttribute(): string|null
    {
        return $this->document ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->document) : null;
    }

    public function sliders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ModelSlider::class, 'model_id', 'id');
    }
}
