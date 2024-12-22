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
            'main_page_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'video' => 'nullable',
            'price_list' => 'nullable',
            'price_list_kz' => 'nullable',
            'document' => 'nullable',
            'document_kz' => 'nullable',
            'is_active' => 'nullable|boolean',
            'brand_id' => 'required',
            'char1_title' => 'nullable|max:255',
            'char1_value' => 'nullable|max:255',
            'char2_title' => 'nullable|max:255',
            'char2_value' => 'nullable|max:255',
            'char3_title' => 'nullable|max:255',
            'char3_value' => 'nullable|max:255',
            'char4_title' => 'nullable|max:255',
            'char4_value' => 'nullable|max:255',
            'char1_title_kz' => 'nullable|max:255',
            'char1_value_kz' => 'nullable|max:255',
            'char2_title_kz' => 'nullable|max:255',
            'char2_value_kz' => 'nullable|max:255',
            'char3_title_kz' => 'nullable|max:255',
            'char3_value_kz' => 'nullable|max:255',
            'char4_title_kz' => 'nullable|max:255',
            'char4_value_kz' => 'nullable|max:255',
            'seo_title' => 'nullable|max:255',
            'seo_description' => 'nullable|max:255',
            'seo_keywords' => 'nullable|max:255',
        ];
    }
}
