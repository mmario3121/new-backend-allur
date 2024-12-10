<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'value',
        'value_kz',
        'complectation_id',
    ];

    public function complectation()
    {
        return $this->belongsTo(ModelComplectation::class, 'complectation_id', 'id');
    }
}
