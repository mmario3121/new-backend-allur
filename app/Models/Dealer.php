<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    use HasFactory;

    protected $guarded = false;

    const CACHE_TIME = 60 * 60 * 24;
    const IMAGE_PATH = 'images/dealers';

    protected $fillable = ['name', 'name_kz', 'url', 'bitrix_id', 'city_id', 'user_id', 'brand_id'];

    protected $hidden = ['updated_at', 'created_at'];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    //dealerAddress
    public function address()
    {
        return $this->hasMany(DealerAddress::class, 'dealer_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
