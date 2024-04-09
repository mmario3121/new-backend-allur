<?php

namespace App\Http\Requests\Admin\Social;

use Illuminate\Foundation\Http\FormRequest;

class StoreSocialRequest extends FormRequest
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
        
        //4 blocks with title, image, text
        return [
            'block1_title' => 'nullable|string',
            'block1_image' => 'nullable|image',
            'block1_text' => 'nullable|string',
            'block2_title' => 'nullable|string',
            'block2_image' => 'nullable|image',
            'block2_text' => 'nullable|string',
            'block3_title' => 'nullable|string',
            'block3_image' => 'nullable|image',
            'block3_text' => 'nullable|string',
            'block4_title' => 'nullable|string',
            'block4_image' => 'nullable|image',
            'block4_text' => 'nullable|string',
        ];
    }
}
