<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translate extends Model
{
    protected $guarded = false;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    const LANGUAGES = ['ru', 'kz'];
    const LANGUAGES_ASSOC = ['ru' => 'Русский', 'kz' => 'Казахский'];
    const DEFAULT_LANG = 'ru';
}
