<?php

namespace App\Http\Controllers\Api\V1\Platform;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Platform\SubscriptionResource;
use App\Models\Subscription;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PlatformSubscriptionController extends Controller
{
    public function subscription()
    {
        $subscription = cache()->remember('subscription', Subscription::CACHE_TIME, function () {
            return Subscription::query()
                ->withTranslations()
                ->first();
        });

        return new JsonResponse([
            'subscription' => $subscription ? new SubscriptionResource($subscription) : null,
        ], Response::HTTP_OK);
    }

}
