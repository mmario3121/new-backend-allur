<?php

namespace App\Http\Requests\Admin\MainPage;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMainPageRequest extends FormRequest
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
            'production_title' => 'required',
            'production_title_kz' => 'required',
            'production_description' => 'required',
            'production_description_kz' => 'required',
            'consultation_photo' => 'nullable|image',
            'career_title' => 'required',
            'career_title_kz' => 'required',
            'career_text' => 'required',
            'career_text_kz' => 'required',
            'career_photo1' => 'nullable|image',
            'seo_title' => 'required',
            'seo_description' => 'required',
            'seo_keywords' => 'required',
        ];
    }
}
