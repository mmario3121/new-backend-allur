<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
/**
 * App\Models\Specification
 *
 * @property int $id
 * @property int $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SpecificationItem[] $specificationItems
 * @property-read int|null $specification_items_count
 * @property-read \App\Models\Translate|null $titleTranslate
 * @method static \Illuminate\Database\Eloquent\Builder|Specification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Specification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Specification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Specification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specification whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specification whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Specification withTranslations()
 */
class Specification extends Model
{
    protected $guarded = false;

    const CACHE_TIME = 60 * 60 * 24;

    protected $hidden = [
      'created_at',
      'updated_at'
    ];
    protected $fillable = ['specification_category_id','title', 'title_kz', 'complectation_id', 'value', 'value_kz'];


    public function complectation(): HasOne
    {
        return $this->hasOne(ModelComplectation::class, 'id', 'complectation_id');
    }
}
