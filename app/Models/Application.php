<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Application
 *
 * @property int $id
 * @property string $phone
 * @property string $name
 * @property string|null $email
 * @property string|null $comment
 * @property int|null $city_id
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\City|null $city
 * @property-read string $status_name
 * @property-read string $time_format
 * @method static \Illuminate\Database\Eloquent\Builder|Application newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Application newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Application query()
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application withTranslations()
 * @mixin \Eloquent
 */
class Application extends Model
{
    protected $guarded = false;

    protected $appends = ['status_name', 'time_format'];

    protected $fillable = [
        'name', 'phone', 'dealer', 'model', 'city', 'status'
    ];
    const STATUSES = [
        0 => 'Не отправлено',
        1 => 'Отправлено, новая',
        2 => 'Прочитано',
    ];

    public function getTimeFormatAttribute(): string
    {
        return $this->created_at ? $this->created_at->format('d.m.Y H:i') : 'Время не неизвестен';
    }

    public function getStatusNameAttribute(): string
    {
        return self::STATUSES[$this->status] ?? 'Тип неизвестен';
    }

    public function city(): HasOne
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function scopeWithTranslations($query)
    {
        return $query->with(['city.titleTranslate']);
    }

    //getdealer
    public function getDealer(): HasOne
    {
        return $this->hasOne(Dealer::class, 'bitrix_id', 'dealer');
    }

    //getmodel

    public function getModel(): HasOne
    {
        return $this->hasOne(CarModel::class, 'bitrix_id', 'model');
    }

    //getcity
    public function getCity(){
        return City::where('bitrix_id', $this->city_id)->first();
    }
}
