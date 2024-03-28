<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    const IMAGE_PATH = 'images/achievements';
    protected $fillable = [
        'title',
        'title_kz',
        'description',
        'description_kz',
        'description2',
        'description2_kz',
    ];

    public function achievementImages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AchievementImage::class, 'achievement_id', 'id');
    }

}
