<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SpecificationCategory extends Model
{
    use HasFactory;

    protected $fillable = ['model_id','title', 'title_kz',  'position'];

    public function specifications(): HasMany
    {
        return $this->hasMany(Specification::class, 'specification_category_id', 'id')
                ->orderBy('position');
    }

}
