<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\BannerResource;
use App\Http\Resources\V1\ShortModelResource;
use App\Models\Banner;
use App\Models\Carera;
use App\Models\City;
use App\Models\CompanySlider;
use App\Models\FinancePage;
use App\Models\Komek;
use App\Models\MainPage;
use App\Models\AboutCompany;
use App\Models\Social;
use App\Models\WorldCategory;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Article;
use App\Models\CarType;
use App\Models\CarModel;
use App\Models\DealerSeo;
use App\Models\Dealer;
use App\Models\DealerAddress;
use App\Models\Brand;
use App\Models\Carreer;

use App\Http\Resources\V1\SlidersResource;
use App\Http\Resources\V1\CarTypeResource;
use App\Http\Resources\V1\ArticleResource;
use App\Http\Resources\V1\LibraryModelResource;
use App\Http\Resources\V1\DealerAddressResource;
use App\Http\Resources\V1\WorldCategoryResource;
use App\Http\Resources\V1\WorldCategoryMainResource;
use App\Http\Resources\V1\DealerSeoResource;
use App\Http\Resources\V1\KomekResource;
use App\Http\Resources\V1\DealerResource;
use App\Http\Resources\V1\CityResource;
use App\Http\Resources\V1\MainPageResource;
use App\Http\Resources\V1\BrandResource;
use App\Http\Resources\V1\CityShortResource;
use App\Http\Resources\V1\BrandTypeResource;
use App\Http\Resources\V1\CompanySliderResource;
use App\Http\Resources\V1\CarreerResource;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
    public function home(Request $request){
        $data['main'] = new MainPageResource(MainPage::first());

        return new JsonResponse($data, Response::HTTP_OK);
    }

    //brands
    public function brand(Request $request){
        $data = new BrandResource(Brand::where('id', $request->id)->first());
        return new JsonResponse($data, Response::HTTP_OK);
    }
    public function brandTypes(Request $request){
        $data = new BrandTypeResource(Brand::where('id', $request->id)->first());
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
        $data['cities'] = CityShortResource::collection(City::all());
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

    //finance
    public function finance(Request $request){
        $data = FinancePage::first();
        $data['news'] = ArticleResource::collection(Article::where('isFinance', 1)->get());
        return new JsonResponse($data, Response::HTTP_OK);
    }

    //about
    public function about(Request $request){
        $data['about'] = AboutCompany::first();
        $data['slider'] = CompanySliderResource::collection(CompanySlider::orderBy('position', 'asc')->get());
        $data['news'] = ArticleResource::collection(Article::where('isAbout', 1)->get());
        return new JsonResponse($data, Response::HTTP_OK);
    }

    //production

    public function production(Request $request){
        $data = new CarreerResource(Carreer::first());
        $data['news'] = ArticleResource::collection(Article::where('isProduction', 1)->get());
        return new JsonResponse($data, Response::HTTP_OK);
    }
    //socials
    public function socials(Request $request){
        $data['socials'] = Social::first();
        return new JsonResponse($data, Response::HTTP_OK);
    }

    public function career(Request $request){
        $data['career'] = Carera::first();
        $data['slider'] = SlidersResource::collection(Slider::all());
        return new JsonResponse($data, Response::HTTP_OK);
    }

    public function filterModels(Request $request){
        $brands = Brand::all();
    
        $modelsQuery = CarModel::query()->with('brand', 'complectations');
    
        if($request->startPrice){
            $modelsQuery->whereHas('complectations', function($query) use ($request){
                $query->where('price', '>=', $request->startPrice);
            });
        }
        if($request->endPrice){
            $modelsQuery->whereHas('complectations', function($query) use ($request){
                $query->where('price', '<=', $request->endPrice);
            });
        }
        if($request->brand_id){
            $brandsIds = explode(',', $request->brand_id);
            $modelsQuery->whereIn('brand_id', $brandsIds);
        }
    
        $models = $modelsQuery->get();
    
        $groupedModels = $models->groupBy('brand_id');
    
        $data['brands'] = $brands->map(function($brand) use ($groupedModels) {
            return [
                'brand' => $brand->title,
                'models' => ShortModelResource::collection($groupedModels->get($brand->id) ?? collect())
            ];
        });
    
        return new JsonResponse($data, Response::HTTP_OK);
    }

    public function brands(Request $request){
        $brands = Brand::all();
        $data['brands'] = $brands->map(function($brand){
            return [
                'brand' => $brand->title,
                'models' => ShortModelResource::collection($brand->models)
            ];
        });
        return new JsonResponse($data, Response::HTTP_OK);
    }

    public function komek(Request $request){
        $komek = Komek::where('id', 1)->first();
        $data['komek'] = new KomekResource($komek);
        return new JsonResponse($data, Response::HTTP_OK);
    }

    public function tradeIn(Request $request){
        $data = Komek::where('id', 2)->first();
        return new JsonResponse($data, Response::HTTP_OK);
    }


}
