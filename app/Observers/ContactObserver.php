<?php

namespace App\Observers;

class ContactObserver
{
    public function saved()
    {
        cache()->forget('contact');
    }

    public function created()
    {
        cache()->forget('contact');
    }

    public function updated()
    {
        cache()->forget('contact');
    }

    public function deleted()
    {
        cache()->forget('contact');
    }

}
