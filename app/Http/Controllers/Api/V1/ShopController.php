<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ShopItem;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //index with filters: category, price, size, color
    public function index(Request $request){
        $items = ShopItem::query();
        if($request->filled('category')){
            $items->where('category', $request->category);
        }
        if($request->filled('price')){
            $price = explode('-', $request->price);
            $items->whereBetween('price', [$price[0], $price[1]]);
        }
        if($request->filled('size')){
            $sizes = explode(',', $request->size);
            $items->whereIn('size', $sizes);
        }
        if($request->filled('color')){
            $items->where('color', $request->color);
        }
        $data['items'] = $items->get();
        return response()->json($data);
    }
}
