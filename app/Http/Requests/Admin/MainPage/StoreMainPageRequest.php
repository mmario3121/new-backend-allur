<?php

namespace App\Http\Requests\Admin\MainPage;

use Illuminate\Foundation\Http\FormRequest;

class StoreMainPageRequest extends FormRequest
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
            'video' => 'required',
            'mobile_video' => 'required',
            'finance_title' => 'required',
            'finance_title_kz' => 'required',
            'finance_photo' => 'required|image',
            'career_photo1' => 'required|image',
            'career_photo2' => 'required|image',
            'career_photo3' => 'required|image',
            'career_title' => 'required',
            'career_title_kz' => 'required',
            'consultation_photo' => 'required|image',
            'production_title' => 'required',
            'production_title_kz' => 'required',
            'production_description' => 'required',
            'production_description_kz' => 'required',
            'production_subtitle' => 'required',
            'production_subtitle_kz' => 'required',
            'production_image' => 'required|image',
        ];
    }
}
