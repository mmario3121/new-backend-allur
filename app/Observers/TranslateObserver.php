<?php

namespace App\Observers;

use App\Models\Translate;

class TranslateObserver
{
    public function saved(Translate $translate)
    {
        cache()->forget('video');
        cache()->forget('videoTitle');
        cache()->forget('servicesDescription');
    }

    public function created(Translate $translate)
    {
        cache()->forget('video');
        cache()->forget('videoTitle');
        cache()->forget('servicesDescription');
    }

    public function updated(Translate $translate)
    {
        cache()->forget('video');
        cache()->forget('videoTitle');
        cache()->forget('servicesDescription');
    }

    public function deleted(Translate $translate)
    {
        cache()->forget('video');
        cache()->forget('videoTitle');
        cache()->forget('servicesDescription');
    }
}
