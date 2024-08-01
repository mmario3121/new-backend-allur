<?php

namespace App\Http\Requests\Admin\Promo;

use Illuminate\Foundation\Http\FormRequest;

class StorePromoRequest extends FormRequest
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
            'title' => 'nullable|max:255',
            'title_kz' => 'nullable|max:255',
            'description' => 'nullable',
            'description_kz' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'link' => 'nullable',
            'title2' => 'nullable|max:255',
            'title2_kz' => 'nullable|max:255',
            'description2' => 'nullable',
            'description2_kz' => 'nullable',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'has_form' => 'nullable|boolean',
        ];
    }
}
