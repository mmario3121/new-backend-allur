<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\BannerResource;
use App\Models\Achievement;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//World
use App\Models\World;
use App\Models\WorldCategory;
use App\Http\Resources\V1\HistoryResource;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\V1\WorldCategoryResource;
use App\Http\Resources\V1\BrandResource;
use App\Http\Resources\V1\RndResource;
use App\Models\Rnd;
use App\Http\Resources\V1\AchievementResource;

class WorldController extends Controller
{
    //history

    public function history(Request $request){

        //order by year desc
        $history = World::where('worldcategory_id', 1)
        ->orderBy('year', 'asc')
        ->get();
        $worldCategory = WorldCategory::findorfail(1);
        //worldcategory with resource
        $data['banner'] = new WorldCategoryResource($worldCategory);
        //use resource
        $data['history'] = HistoryResource::collection($history);

        return new JsonResponse($data, Response::HTTP_OK);
    }

    //brand
    public function brand(Request $request){

        //order by year desc
        $brands = World::where('worldcategory_id', 2)
        ->get();
        $worldCategory = WorldCategory::findorfail(2);
        //worldcategory with resource
        $data['banner'] = new WorldCategoryResource($worldCategory);
        //use resource
        $data['brands'] = BrandResource::collection($brands);

        return new JsonResponse($data, Response::HTTP_OK);
    }

    //all worldcategories with resource

    public function worldCategories(Request $request){

        $worldCategories = WorldCategory::all();
        //use resource
        $data['worldCategories'] = WorldCategoryResource::collection($worldCategories);
        $data['banner'] = new BannerResource(Banner::where('slug', 'world')->first());
        return new JsonResponse($data, Response::HTTP_OK);
    }

    //All rnds with resource
    public function rnd(Request $request){

        $rnds = Rnd::all();
        $worldCategory = WorldCategory::findorfail(3);
        //worldcategory with resource
        $data['banner'] = new WorldCategoryResource($worldCategory);
        //use resource
        $data['rnds'] = RndResource::collection($rnds);

        return new JsonResponse($data, Response::HTTP_OK);
    }

    //all achievemets with resource

    public function achievements(Request $request){
        $worldCategory = WorldCategory::findorfail(4);
        $rndAchievements = Achievement::all();
        //use resource
        $data['banner'] = new WorldCategoryResource($worldCategory);
        $data['Achievements'] = AchievementResource::collection($rndAchievements);

        return new JsonResponse($data, Response::HTTP_OK);
    }
}
