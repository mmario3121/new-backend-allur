<?php

namespace App\Observers;

class SpecificationObserver
{
    public function saved()
    {
        cache()->forget('specifications');
    }

    public function created()
    {
        cache()->forget('specifications');
    }

    public function updated()
    {
        cache()->forget('specifications');
    }

    public function deleted()
    {
        cache()->forget('specifications');
    }

}
