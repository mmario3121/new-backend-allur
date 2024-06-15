<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelComplectation extends Model
{
    use HasFactory;

    const IMAGE_PATH = 'images/model-complectation';

    protected $fillable = ['model_id', 'price', 'title', 'bitrix_id', 'is_active'];

    public function specs()
    {
        return $this->hasMany(Spec::class, 'complectation_id', 'id');
    }
}
