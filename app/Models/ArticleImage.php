<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\ArticleImage
 *
 * @property int $id
 * @property string $image
 * @property int $article_id
 * @property int $position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string|null $image_url
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleImage whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleImage whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleImage wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleImage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ArticleImage extends Model
{
    protected $guarded = false;
    protected $appends = ['image_url'];

    const CACHE_TIME = 60 * 60 * 24;
    const IMAGE_PATH = 'images/article-images';

    public function getImageUrlAttribute(): string|null
    {
        return $this->image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image) : null;
    }

}
