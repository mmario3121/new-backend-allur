<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopItem extends Model
{
    use HasFactory;

    const IMAGE_PATH = 'images/shop-items';
    protected $fillable = ['title', 'article', 'color', 'size', 'price', 'description', 'image', 'category', 'shop_item_id'];

    public function images()
    {
        return $this->hasMany(ShopItemImage::class, 'shop_item_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(ShopItem::class, 'shop_item_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(ShopItem::class, 'shop_item_id', 'id');
    }

    //children_count

    public function getChildrenCountAttribute(): int
    {
        return $this->children()->count();
    }
}
