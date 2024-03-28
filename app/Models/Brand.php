<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
/**
 * App\Models\Brand
 *
 * @property int $id
 * @property string $title
 * @property int $position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Brand extends Model
{
    protected $guarded = false;
    const IMAGE_PATH = 'images/brands';

    const CACHE_TIME = 60 * 60 * 24;
    protected $appends = ['logo_url'];

    protected $fillable = ['logo','title', 'position', 'bitrix_id'];
    protected $hidden = ['updated_at', 'created_at'];

    public function getLogoUrlAttribute()
    {
        return $this->logo ? Storage::disk('custom')->url(self::IMAGE_PATH . '/' . $this->logo) : null;
    }
}
