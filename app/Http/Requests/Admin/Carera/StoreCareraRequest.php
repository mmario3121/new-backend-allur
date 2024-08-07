<?php

namespace App\Http\Requests\Admin\Carera;

use Illuminate\Foundation\Http\FormRequest;

class StoreCareraRequest extends FormRequest
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
            //10 blocks with image, title, description
            //4 cards
            //nullable
        return [
            'block1_title' => 'nullable|string',
            'block1_text' => 'nullable|string',
            'block1_image' => 'nullable',
            'block2_title' => 'nullable|string',
            'block2_text' => 'nullable|string',
            'block2_image' => 'nullable|image',
            'block3_image' => 'nullable|image',
        ];
    }
}
