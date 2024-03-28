<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\Agreement
 *
 * @property int $id
 * @property int|null $link
 * @property int $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Translate|null $fileTranslate
 * @method static \Illuminate\Database\Eloquent\Builder|Agreement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agreement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agreement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Agreement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agreement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agreement whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agreement whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agreement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Agreement extends Model
{
    protected $guarded = false;

    const FILE_PATH = 'files/agreements';
    const CACHE_TIME = 60 * 60 * 24;

    const TYPES = [
        0 => 'Правила пользования',
        1 => 'Политика конфиденциальности',
    ];

    public function getTypeNameAttribute(): string
    {
        return self::TYPES[$this->type] ?? 'Тип неизвестен';
    }

    public function fileTranslate(): HasOne
    {
        return $this->hasOne(Translate::class, 'id', 'link');
    }

    public function fileUrl($files, string $language = 'ru'): string
    {
        $filteredFiles = array_filter($files->only(Translate::LANGUAGES));

        if (!$filteredFiles) return false;

        $file = $filteredFiles[$language] ?? $filteredFiles[array_key_first($filteredFiles)];

        return Storage::disk('custom')->url(self::FILE_PATH . '/' . $file);
    }
}
