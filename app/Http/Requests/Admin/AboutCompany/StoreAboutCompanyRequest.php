<?php

namespace App\Http\Requests\Admin\AboutCompany;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutCompanyRequest extends FormRequest
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
        //block1 - title, text, image
            //block2 - title, text, image
            //block3 - title, text, image, card1, card2
            //block4 - title, text, image
            //block5 - title, text, image
            //block6 - title, text, image
            //all nullable
        return [
            'block1_title' => 'nullable|string',
            'block1_text' => 'nullable|string',
            'block1_image' => 'nullable|image',
            'block2_title' => 'nullable|string',
            'block2_text' => 'nullable|string',
            'block2_image' => 'nullable|image',
            'block3_title' => 'nullable|string',
            'block3_text' => 'nullable|string',
            'block3_image' => 'nullable|image',
            'block3_card1' => 'nullable|string',
            'block3_card2' => 'nullable|string',
            'block4_title' => 'nullable|string',
            'block4_text' => 'nullable|string',
            'block4_image' => 'nullable|image',
            'block5_title' => 'nullable|string',
            'block5_text' => 'nullable|string',
            'block5_image' => 'nullable|image',
            'block6_title' => 'nullable|string',
            'block6_text' => 'nullable|string',
            'block6_image' => 'nullable|image',
        ];
    }
}
