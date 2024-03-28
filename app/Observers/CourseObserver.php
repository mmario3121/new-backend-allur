<?php

namespace App\Observers;

class CourseObserver
{
    public function saved()
    {
        cache()->forget('courses');
    }

    public function created()
    {
        cache()->forget('courses');
    }

    public function updated()
    {
        cache()->forget('courses');
    }

    public function deleted()
    {
        cache()->forget('courses');
    }
}
