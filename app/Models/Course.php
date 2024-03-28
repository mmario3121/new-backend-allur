<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\Course
 *
 * @property int $id
 * @property int $title
 * @property string|null $image
 * @property int $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string|null $image_url
 * @property-read \App\Models\Translate|null $titleTranslate
 * @method static \Illuminate\Database\Eloquent\Builder|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course withTranslations()
 * @mixin \Eloquent
 * @property int|null $description
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CourseImage[] $courseImages
 * @property-read int|null $course_images_count
 * @property-read \App\Models\Translate|null $descriptionTranslate
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDescription($value)
 */
class Course extends Model
{
    protected $guarded = false;

    const CACHE_TIME = 60 * 60 * 24;
    const IMAGE_PATH = 'images/course-images';

    protected $hidden = ['updated_at', 'created_at'];
    protected $appends = ['image_url'];

    public function titleTranslate(): HasOne
    {
        return $this->hasOne(Translate::class, 'id', 'title');
    }

    public function descriptionTranslate(): HasOne
    {
        return $this->hasOne(Translate::class, 'id', 'description');
    }

    public function courseImages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CourseImage::class, 'course_id', 'id');
    }

    public function getImageUrlAttribute(): string|null
    {
        return $this->image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image) : null;
    }

    public function scopeWithTranslations($query)
    {
        return $query->with(['titleTranslate', 'descriptionTranslate', 'courseImages']);
    }
}
