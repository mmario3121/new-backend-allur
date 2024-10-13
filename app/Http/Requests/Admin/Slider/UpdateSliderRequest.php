<?php

namespace App\Http\Requests\Admin\Slider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
            'position' => 'nullable',
            'link' => 'required',
            'image' => 'nullable|image',
            'image_mob' => 'nullable|image',
            'image_kz' => 'nullable|image',
            'image_mob_kz' => 'nullable|image',
            'title' => 'required|max:255',
            'title_kz' => 'required|max:255',
        ];
    }
}
