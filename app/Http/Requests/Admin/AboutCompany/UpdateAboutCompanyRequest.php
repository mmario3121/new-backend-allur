<?php

namespace App\Http\Requests\Admin\AboutCompany;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutCompanyRequest extends FormRequest
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
            'block3_card1' => 'nullable|string',
            'block3_card1_text' => 'nullable|string',
            'block3_card1_text_kz' => 'nullable|string',
            'block3_card2' => 'nullable|string',
            'block3_card2_text' => 'nullable|string',
            'block3_card2_text_kz' => 'nullable|string',
            'block4_title' => 'nullable|string',
            'block4_text' => 'nullable|string',
            'block4_image' => 'nullable|image',
            'block5_title' => 'nullable|string',
            'block5_text' => 'nullable|string',
            'block5_image' => 'nullable|image',
            'block6_title' => 'nullable|string',
            'block6_text' => 'nullable|string',
            'block6_image' => 'nullable|image',
            'block1_title_kz' => 'nullable|string',
            'block1_text_kz' => 'nullable|string',
            'block2_title_kz' => 'nullable|string',
            'block2_text_kz' => 'nullable|string',
            'block3_title_kz' => 'nullable|string',
            'block3_text_kz' => 'nullable|string',
            'block3_card1_kz' => 'nullable|string',
            'block3_card2_kz' => 'nullable|string',
            'block4_title_kz' => 'nullable|string',
            'block4_text_kz' => 'nullable|string',
            'block5_title_kz' => 'nullable|string',
            'block5_text_kz' => 'nullable|string',
            'block6_title_kz' => 'nullable|string',
            'block6_text_kz' => 'nullable|string',
            'block7_title' => 'nullable|string',
            'block7_title_kz' => 'nullable|string',
            'block7_text' => 'nullable|string',
            'block7_text_kz' => 'nullable|string',
            'block7_image' => 'nullable|image',
            'seo_title' => 'nullable|string',
            'seo_description' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
        ];
    }
}
