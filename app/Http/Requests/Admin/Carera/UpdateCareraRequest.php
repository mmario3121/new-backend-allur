<?php

namespace App\Http\Requests\Admin\Carera;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCareraRequest extends FormRequest
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
            'block1_title' => 'nullable|string',
            'block1_text' => 'nullable|string',
            'block1_title_kz' => 'nullable|string',
            'block1_text_kz' => 'nullable|string',
            'block1_image' => 'nullable',
            'block2_title' => 'nullable|string',
            'block2_text' => 'nullable|string',
            'block2_title_kz' => 'nullable|string',
            'block2_text_kz' => 'nullable|string',
            'block2_image' => 'nullable|image',
            'block3_image' => 'nullable|image',
            'block4_title' => 'nullable|string',
            'block4_title_kz' => 'nullable|string',
            'block4_text' => 'nullable|string',
            'block4_text_kz' => 'nullable|string',
            'block4_image' => 'nullable|image',
            'block5_image' => 'nullable|image',
        ];
    }
}
