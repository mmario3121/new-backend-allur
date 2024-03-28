<?php

namespace App\Observers;

class CityObserver
{
    public function saved()
    {
        cache()->forget('countries');
    }

    public function created()
    {
        cache()->forget('countries');
    }

    public function updated()
    {
        cache()->forget('countries');
    }

    public function deleted()
    {
        cache()->forget('countries');
    }

}
