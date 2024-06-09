<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\BannerResource;
use App\Http\Resources\V1\ShortModelResource;
use App\Models\Banner;
use App\Models\City;
use App\Models\MainPage;
use App\Models\WorldCategory;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Article;
use App\Models\CarType;
use App\Models\CarModel;
use App\Models\DealerSeo;
use App\Models\Dealer;
use App\Models\DealerAddress;

use App\Http\Resources\V1\SlidersResource;
use App\Http\Resources\V1\CarTypeResource;
use App\Http\Resources\V1\ArticleResource;
use App\Http\Resources\V1\LibraryModelResource;
use App\Http\Resources\V1\DealerAddressResource;
use App\Http\Resources\V1\WorldCategoryResource;
use App\Http\Resources\V1\WorldCategoryMainResource;
use App\Http\Resources\V1\DealerSeoResource;
use App\Http\Resources\V1\DealerResource;
use App\Http\Resources\V1\CityResource;
use App\Http\Resources\V1\MainPageResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
    public function home(Request $request){
        $data['main'] = new MainPageResource(MainPage::first());

        return new JsonResponse($data, Response::HTTP_OK);
    }

    public function libraries(Request $request){
        $data['models'] = LibraryModelResource::collection(CarModel::all());
        $data['banner'] = new BannerResource(Banner::where('slug', 'library')->first());
        return new JsonResponse($data, Response::HTTP_OK);
    }
    public function dealerSeos(Request $request){
        $dealers = Dealer::where('url', $request->url)->pluck('id')->toArray();
        if ($dealers != null) {
            $data['dealer_seo'] = DealerSeoResource::collection(DealerSeo::whereIn('dealer_id', $dealers)->get());
        }
        return new JsonResponse($data, Response::HTTP_OK);
    }

    public function dealerAddresses(Request $request){

        $data['banner'] = new BannerResource(Banner::where('slug', 'dealers')->first());
        $dealers = Dealer::where('url', $request->url)->pluck('id')->toArray();
        //use resource
        if($dealers == null){
            return 'Not Found';
        }
        $data['addresses'] = DealerAddressResource::collection(DealerAddress::all());
        return new JsonResponse($data, Response::HTTP_OK);
    }

    public function dealers(Request $request){
        //use dealersresource
        $data['dealers'] = DealerResource::collection(Dealer::all());
        return new JsonResponse($data, Response::HTTP_OK);
    }

    //cities
    public function cities(Request $request){
        $data['cities'] = CityResource::collection(City::all());
        return new JsonResponse($data, Response::HTTP_OK);
    }

    //models
    public function models(Request $request){
        $data['models'] = ShortModelResource::collection(CarModel::where('is_active', 1)->get());
        $data['banner'] = new BannerResource(Banner::where('slug', 'models')->first());
        return new JsonResponse($data, Response::HTTP_OK);
    }

    //banner by slug
    public function banners(Request $request){
        $data['banners'] = new BannerResource(Banner::where('slug', $request->slug)->first());
        return new JsonResponse($data, Response::HTTP_OK);
    }
}
