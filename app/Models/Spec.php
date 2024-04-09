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
        'model_id',
    ];

    public function model()
    {
        return $this->belongsTo(Model::class);
    }

}
