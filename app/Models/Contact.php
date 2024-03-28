<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\Contact
 *
 * @property int $id
 * @property int|null $company
 * @property int|null $address
 * @property string|null $image
 * @property string|null $email
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Translate|null $addressTranslate
 * @property-read \App\Models\Translate|null $companyTranslate
 * @property-read string|null $image_url
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact withTranslations()
 * @mixin \Eloquent
 */
class Contact extends Model
{
    const CACHE_TIME = 60 * 60 * 24;
    const IMAGE_PATH = 'images/contacts-images';

    protected $appends = ['image_url'];
    protected $guarded = false;

    public function getImageUrlAttribute(): string|null
    {
        return $this->image ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->image) : null;
    }

    public function addressTranslate(): HasOne
    {
        return $this->hasOne(Translate::class, 'id', 'address');
    }

    public function companyTranslate(): HasOne
    {
        return $this->hasOne(Translate::class, 'id', 'company');
    }

    public function scopeWithTranslations($query)
    {
        return $query->with(['addressTranslate']);
    }
}
