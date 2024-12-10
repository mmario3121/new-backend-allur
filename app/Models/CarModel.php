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
    protected $appends = ['logo_url', 'video_url', 'price_list_url', 'document_url', 'main_page_image_url', 'price_list_kz_url', 'document_kz_url'];

    protected $fillable = ['type_id', 'slug', 'title', 'title_kz', 'logo', 'video', 'price_list', 'document', 'bitrix_id', 'is_active', 'brand_id',
        'char1_title', 'char1_value', 'char2_title', 'char2_value', 'char3_title', 'char3_value', 'char4_title', 'char4_value',
        'char1_title_kz', 'char1_value_kz', 'char2_title_kz', 'char2_value_kz', 'char3_title_kz', 'char3_value_kz', 'char4_title_kz', 'char4_value_kz', 'main_page_image'];

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
    public function getPriceListKzUrlAttribute(): string|null
    {
        return $this->price_list_kz ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->price_list_kz) : null;
    }
    public function getDocumentUrlAttribute(): string|null
    {
        return $this->document ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->document) : null;
    }
    public function getDocumentKzUrlAttribute(): string|null
    {
        return $this->document_kz ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->document_kz) : null;
    }

    public function getMainPageImageUrlAttribute(): string|null
    {
        return $this->main_page_image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->main_page_image) : null;
    }

    public function sliders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ModelSlider::class, 'model_id', 'id');
    }

    public function specs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Spec::class, 'model_id', 'id');
    }

    public function complectations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ModelComplectation::class, 'model_id', 'id');
    }

    public function min_price(): int
    {
        return $this->complectations()->min('price');
    }

    public function brand(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }
}
