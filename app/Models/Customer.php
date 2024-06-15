<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Customer extends Model implements AuthenticatableContract, JWTSubject
{
    use HasFactory, Authenticatable;

    protected $fillable = ['email', 'password', 'name', 'surname', 'phone', 'city_id', 'address', 'gender', 'birth_date', 'iin', 'is_active', 'is_subscribed', 'is_notified'];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}