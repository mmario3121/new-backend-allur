<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class Library extends Model
{
    use HasFactory;
    protected $guarded = false;

    const CACHE_TIME = 60 * 60 * 24;
    const IMAGE_PATH = 'images/libraries';

    protected $appends = ['file_url'];

    protected $fillable = ['file', 'type', 'position', 'model_id'];

    protected $hidden = ['updated_at', 'created_at'];

    public function getFileUrlAttribute(): string|null
    {
        return $this->file ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->file) : null;
    }

    //cover_photo_url
    public function getCoverPhotoUrlAttribute(): string|null
    {
        return $this->cover_photo ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->cover_photo) : null;
    }
    public function model(): HasOne
    {
        return $this->hasOne(CarModel::class, 'id', 'model_id');
    }
    public function carModel()
    {
        return $this->belongsTo(CarModel::class, 'model_id', 'id');
    }

    public function getType($lang){
        if($lang == 'ru'){
            if($this->type === 'image'){
                return 'HONGQI ФОТОГРАФИИ';
            }elseif($this->type === 'video'){
                return 'HONGQI ВИДЕО';
            }elseif($this->type === 'file'){
                return 'HONGQI ДАННЫЕ';
            }
        }else{
            if($this->type === 'image'){
                return 'HONGQI ФОТОГРАФИЯЛАР';
            }elseif($this->type === 'video'){
                return 'HONGQI ВИДЕОЛАР';
            }elseif($this->type === 'file'){
                return 'HONGQI АҚПАРАТТАР';
            }
        }
    }
}
