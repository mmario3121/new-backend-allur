<?php

namespace App\Http\Requests\Admin\ShopItem;

use Illuminate\Foundation\Http\FormRequest;

class StoreShopItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'article' => 'required|max:255',
            'color' => 'required|max:255',
            'size' => 'required|max:255',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image',
            'category' => 'required|max:255',
            'shop_item_id' => 'nullable',
        ];
    }
}
