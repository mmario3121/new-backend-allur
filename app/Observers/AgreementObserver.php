<?php

namespace App\Observers;

class AgreementObserver
{
    public function saved()
    {
        cache()->forget('agreements');
    }

    public function created()
    {
        cache()->forget('agreements');
    }

    public function updated()
    {
        cache()->forget('agreements');
    }

    public function deleted()
    {
        cache()->forget('agreements');
    }
}
