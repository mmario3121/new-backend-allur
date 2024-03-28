<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealerSeo extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected $fillable = ['code', 'position', 'dealer_id'];

    public function dealer()
    {
        return $this->belongsTo(Dealer::class, 'dealer_id', 'id');
    }
}
