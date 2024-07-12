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
            'video' => 'nullable',
            'mobile_video' => 'nullable',
            'finance_title' => 'required',
            'finance_title_kz' => 'required',
            'finance_photo' => 'nullable|image',
            'career_photo1' => 'nullable|image',
            'career_photo2' => 'nullable|image',
            'career_photo3' => 'nullable|image',
            'career_title' => 'required',
            'career_title_kz' => 'required',
            'career_text' => 'required',
            'career_text_kz' => 'required',
            'consultation_photo' => 'nullable|image',
            'production_title' => 'required',
            'production_title_kz' => 'required',
            'production_description' => 'required',
            'production_description_kz' => 'required',
            'production_subtitle' => 'required',
            'production_subtitle_kz' => 'required',
            'production_image' => 'nullable|image',
        ];
    }
}
