<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SpecificationItem extends Model
{
    protected $guarded = false;

    public function titleTranslate(): HasOne
    {
        return $this->hasOne(Translate::class, 'id', 'title');
    }

    public function specification(): HasOne
    {
        return $this->hasOne(Specification::class, 'id', 'specification_id');
    }

    public function mentorSpecificationItems(): HasMany
    {
        return $this->hasMany(MentorSpecificationItem::class, 'specification_item_id', 'id');
    }

    public function scopeWithTranslations($query)
    {
        return $query->with(['titleTranslate']);
    }
}
