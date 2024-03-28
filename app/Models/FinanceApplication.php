<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanceApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'status',
        'name',
        'phone',
        'iin'
    ];

    public function city()
    {
        return $this->belongsTo(FinanceCity::class, 'city_id', 'id');
    }
}
