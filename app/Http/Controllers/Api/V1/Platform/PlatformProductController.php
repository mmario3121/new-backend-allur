<?php

namespace App\Http\Controllers\Api\V1\Platform;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Platform\CourseResource;
use App\Http\Resources\V1\Platform\GuideResource;
use App\Models\Course;
use App\Models\Guide;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PlatformProductController extends Controller
{
    public function guides()
    {
        $guides = cache()->remember('guides', Guide::CACHE_TIME, function () {
            return Guide::query()
                ->withTranslations()
                ->get();
        });

        return new JsonResponse([
            'guides' => GuideResource::collection($guides),
        ], Response::HTTP_OK);
    }

    public function courses()
    {
        $courses = cache()->remember('courses', Course::CACHE_TIME, function () {
            return Course::query()
                ->withTranslations()
                ->get();
        });

        return new JsonResponse([
            'courses' => CourseResource::collection($courses),
        ], Response::HTTP_OK);
    }
}
