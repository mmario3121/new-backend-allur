<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealerAddress extends Model
{
    use HasFactory;
    protected $guarded = false;

    protected $fillable = ['address', 'address_kz', 'worktime', 'worktime_kz', 'phone','dealer_id', 'coordinates'];

    public function dealer()
    {
        return $this->belongsTo(Dealer::class, 'dealer_id', 'id');
    }
}
