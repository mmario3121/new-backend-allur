<?php

namespace App\Http\Requests\Admin\Carreer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarreerRequest extends FormRequest
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
            'block1_image' => 'nullable|image',
            'block2_title' => 'nullable|string',
            'block2_text' => 'nullable|string',
            'block2_image' => 'nullable|image',
            'block3_title' => 'nullable|string',
            'block3_text' => 'nullable|string',
            'block3_image' => 'nullable|image',
            'block4_title' => 'nullable|string',
            'block4_text' => 'nullable|string',
            'block4_image' => 'nullable|image',
            'block5_title' => 'nullable|string',
            'block5_text' => 'nullable|string',
            'block5_image' => 'nullable|image',
            'block6_title' => 'nullable|string',
            'block6_text' => 'nullable|string',
            'block6_image' => 'nullable|image',
            'block7_title' => 'nullable|string',
            'block7_text' => 'nullable|string',
            'block7_image' => 'nullable|image',
            'block8_title' => 'nullable|string',
            'block8_text' => 'nullable|string',
            'block8_image' => 'nullable|image',
            'block9_title' => 'nullable|string',
            'block9_text' => 'nullable|string',
            'block9_image' => 'nullable|image',
            'block10_title' => 'nullable|string',
            'block10_text' => 'nullable|string',
            'block10_image' => 'nullable|image',
            'block11_title' => 'nullable|string',
            'block11_text' => 'nullable|string',
            'block11_image' => 'nullable|image',
            'card1_title' => 'nullable|string',
            'card1_text' => 'nullable|string',
            'card2_title' => 'nullable|string',
            'card2_text' => 'nullable|string',
            'card3_title' => 'nullable|string',
            'card3_text' => 'nullable|string',
            'card4_title' => 'nullable|string',
            'card4_text' => 'nullable|string',
            'block1_title_kz' => 'nullable|string',
            'block1_text_kz' => 'nullable|string',
            'block2_title_kz' => 'nullable|string',
            'block2_text_kz' => 'nullable|string',
            'block3_title_kz' => 'nullable|string',
            'block3_text_kz' => 'nullable|string',
            'block4_title_kz' => 'nullable|string',
            'block4_text_kz' => 'nullable|string',
            'block5_title_kz' => 'nullable|string',
            'block5_text_kz' => 'nullable|string',
            'block6_title_kz' => 'nullable|string',
            'block6_text_kz' => 'nullable|string',
            'block7_title_kz' => 'nullable|string',
            'block7_text_kz' => 'nullable|string',
            'block8_title_kz' => 'nullable|string',
            'block8_text_kz' => 'nullable|string',
            'block9_title_kz' => 'nullable|string',
            'block9_text_kz' => 'nullable|string',
            'block10_title_kz' => 'nullable|string',
            'block10_text_kz' => 'nullable|string',
            'block11_title_kz' => 'nullable|string',
            'block11_text_kz' => 'nullable|string',
            'card1_title_kz' => 'nullable|string',
            'card1_text_kz' => 'nullable|string',
            'card2_title_kz' => 'nullable|string',
            'card2_text_kz' => 'nullable|string',
            'card3_title_kz' => 'nullable|string',
            'card3_text_kz' => 'nullable|string',
            'card4_title_kz' => 'nullable|string',
            'card4_text_kz' => 'nullable|string',
        ];
    }
}
