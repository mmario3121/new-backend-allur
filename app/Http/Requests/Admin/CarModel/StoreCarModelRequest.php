<?php

namespace App\Http\Requests\Admin\CarModel;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarModelRequest extends FormRequest
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
            'type_id' => 'required',
            'slug' => 'required|max:255',
            'title' => 'required|max:255',
            'title_kz' => 'required|max:255',
            'bitrix_id' => 'nullable|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'video' => 'nullable',
            'price_list' => 'nullable',
            'document' => 'nullable',
            'is_active' => 'nullable|boolean',
            'brand_id' => 'required',
        ];
    }
}
