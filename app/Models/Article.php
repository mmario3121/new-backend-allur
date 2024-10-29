<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\Article
 *
 * @property int $id
 * @property int|null $title
 * @property int|null $description
 * @property string|null $slug
 * @property string|null $image
 * @property string $time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ArticleImage[] $articleImages
 * @property-read int|null $article_images_count
 * @property-read \App\Models\Translate|null $descriptionTranslate
 * @property-read string|null $image_url
 * @property-read \App\Models\Translate|null $titleTranslate
 * @method static \Illuminate\Database\Eloquent\Builder|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article withTranslations()
 * @mixin \Eloquent
 */
class Article extends Model
{
    protected $guarded = false;
    protected $appends = ['image_url', 'image_kz_url'];

    const CACHE_TIME = 60 * 60 * 24;
    const IMAGE_PATH = 'images/articles';

    public static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            $slug = str()->slug($article->titleTranslate?->ru);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $article->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }

    protected $casts = [
        'model_ids' => 'array', // Автоматическое преобразование JSON в массив
    ];

    public function titleTranslate(): HasOne
    {
        return $this->hasOne(Translate::class, 'id', 'title');
    }

    public function descriptionTranslate(): HasOne
    {
        return $this->hasOne(Translate::class, 'id', 'description');
    }
    public function descriptionMobTranslate(): HasOne
    {
        return $this->hasOne(Translate::class, 'id', 'description_mob');
    }

    public function articleImages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ArticleImage::class, 'article_id', 'id');
    }

    public function getImageUrlAttribute(): string|null
    {
        return $this->image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image) : null;
    }

    public function getImageKzUrlAttribute(): string|null
    {
        return $this->image_kz ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image_kz) : null;
    }

    //banner
    public function getBannerUrlAttribute(): string|null
    {
        return $this->banner ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->banner) : null;
    }

    public function scopeWithTranslations($query)
    {
        return $query->with([
            'titleTranslate',
            'descriptionTranslate'
        ]);
    }

    public function model()
    {
        return $this->belongsTo(CarModel::class, 'model_id', 'id');
    }
}
