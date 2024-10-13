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
            'carreer_title' => 'required',
            'carreer_title_kz' => 'required',
            'carreer_text' => 'required',
            'carreer_text_kz' => 'required',
            'carreer_photo1' => 'nullable|image',
        ];
    }
}
