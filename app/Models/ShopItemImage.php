<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ShopItemImage extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'shop_item_id'];

    public function item()
    {
        return $this->belongsTo(ShopItem::class, 'shop_item_id', 'id');
    }

    public function getUrlAttribute(): string
    {
        return Storage::disk('custom')->url('images/shop-items/' . $this->image);
    }
}
