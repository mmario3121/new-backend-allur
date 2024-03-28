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
            'finance_photo' => 'nullable|image',
            'career_photo1' => 'nullable|image',
            'career_photo2' => 'nullable|image',
            'career_photo3' => 'nullable|image',
            'career_title' => 'required',
            'career_title_kz' => 'required',
            'consultation_photo' => 'nullable|image',
        ];
    }
}
