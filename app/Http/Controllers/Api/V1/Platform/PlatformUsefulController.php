<?php

namespace App\Http\Controllers\Api\V1\Platform;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Platform\PlatformUsefulAudioResource;
use App\Http\Resources\V1\Platform\PlatformUsefulVideoResource;
use App\Models\UsefulAudioItem;
use App\Models\UsefulVideoItem;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PlatformUsefulController extends Controller
{
    public function videos()
    {
        $data = cache()->remember('platformUsefulVideos', UsefulVideoItem::CACHE_TIME, function () {
            return UsefulVideoItem::query()
                ->withTranslations()
                ->get();
        });

        return new JsonResponse([
            'data' => PlatformUsefulVideoResource::collection($data),
            'data_type' => 'video'
        ], Response::HTTP_OK);
    }

    public function audios()
    {
        $data = cache()->remember('platformUsefulAudios', UsefulAudioItem::CACHE_TIME, function () {
            return UsefulAudioItem::query()
                ->withTranslations()
                ->get();
        });

        return new JsonResponse([
            'data' => PlatformUsefulAudioResource::collection($data),
            'data_type' => 'audio'
        ], Response::HTTP_OK);
    }
}
