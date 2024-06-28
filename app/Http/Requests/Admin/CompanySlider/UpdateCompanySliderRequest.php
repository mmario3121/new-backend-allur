<?php

namespace App\Http\Requests\Admin\CompanySlider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanySliderRequest extends FormRequest
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
            'image' => 'image',
            'image_mob' => 'image',
            'title' => 'required|string',
            'title_kz' => 'required|string',
        ];
    }
}
