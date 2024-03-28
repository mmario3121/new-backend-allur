<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\CarModel;
use App\Models\CarType;
use App\Models\ModelColor;
use App\Models\ModelSection;
use App\Models\ModelSlider;
use App\Models\SpecificationCategory;
use App\Models\ModelComplectation;
use App\Http\Resources\V1\CarModelResource;
use App\Http\Resources\V1\CarTypeResource;
use App\Http\Resources\V1\ModelSliderResource;
use App\Http\Resources\V1\ModelComplectationsResource;
use App\Http\Resources\V1\ModelColorsResource;
use App\Http\Resources\V1\ModelSectionsResource;
use App\Http\Resources\V1\SpecificationCategoryResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CarModelController extends Controller
{
    public function getBySlug(Request $request){
        $model = CarModel::where('slug', $request->slug)->first();
        if($model == null){
            return 'Not Found';
        }
        $colors = ModelColor::where('model_id', $model->id)->get();
        $sections = ModelSection::where('model_id', $model->id)->get();
        $slider = ModelSlider::where('model_id', $model->id)->get();
        $complectations = ModelComplectation::where('model_id', $model->id)->get();
        $specificationCategory = SpecificationCategory::where('model_id', $model->id)->orderBy('position')->get();
        $mainSpecification = SpecificationCategory::where('model_id', $model->id)->orderBy('position')->first();
        $data['model'] = new CarModelResource($model);
        $data['complectations'] = ModelComplectationsResource::collection($complectations);
        $data['colors'] = ModelColorsResource::collection($colors);
        $data['sections'] = ModelSectionsResource::collection($sections);
        $data['specificationCategories'] = SpecificationCategoryResource::collection($specificationCategory);
        $data['mainSpecification'] = new SpecificationCategoryResource($mainSpecification);
        $data['slider'] = ModelSliderResource::collection($slider);
        return new JsonResponse($data, Response::HTTP_OK);
    }
    public function getAll(Request $request){
        $models = CarModel::all();
        return new JsonResponse([
            CarModelResource::collection($models),
        ], Response::HTTP_OK);
    }
    public function getAllByType(Request $request){
        $models = CarModel::where('type_id', $request->type_id);
        return new JsonResponse([
            CarModelResource::collection($models),
        ], Response::HTTP_OK);
    }
    public function getTypes(Request $request){
        $types = CarType::all();
        return new JsonResponse([
            CarTypeResource::collection($types),
        ], Response::HTTP_OK);
    }

}
