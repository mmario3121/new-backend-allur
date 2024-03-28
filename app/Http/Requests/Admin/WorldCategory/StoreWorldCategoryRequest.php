<?php

namespace App\Http\Requests\Admin\WorldCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorldCategoryRequest extends FormRequest
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
            'title' => 'required|max:256',
            'title_kz' => 'required|max:256',
            'slug' => 'required|max:256',
            'image' => 'required|image',
            'image_mob' => 'required|image',
            'cover_photo' => 'nullable|image',
        ];
    }
}
