<?php

namespace App\Http\Requests\Admin\FinancePage;

use Illuminate\Foundation\Http\FormRequest;

class StoreFinancePageRequest extends FormRequest
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
        //title, image, text,
            //card1 - card4 - title, text
            //card5 - card9 - title, text, subtitle
            //block2_image
            //nullable
        return [
            'title' => 'nullable|string',
            'image' => 'nullable|image',
            'text' => 'nullable|string',
            'card1_title' => 'nullable|string',
            'card1_text' => 'nullable|string',
            'card2_title' => 'nullable|string',
            'card2_text' => 'nullable|string',
            'card3_title' => 'nullable|string',
            'card3_text' => 'nullable|string',
            'card4_title' => 'nullable|string',
            'card4_text' => 'nullable|string',
            'card5_title' => 'nullable|string',
            'card5_text' => 'nullable|string',
            'card5_subtitle' => 'nullable|string',
            'card6_title' => 'nullable|string',
            'card6_text' => 'nullable|string',
            'card6_subtitle' => 'nullable|string',
            'card7_title' => 'nullable|string',
            'card7_text' => 'nullable|string',
            'card7_subtitle' => 'nullable|string',
            'card8_title' => 'nullable|string',
            'card8_text' => 'nullable|string',
            'card8_subtitle' => 'nullable|string',
            'card9_title' => 'nullable|string',
            'card9_text' => 'nullable|string',
            'card9_subtitle' => 'nullable|string',
            'block2_image' => 'nullable|image',
        ];
    }
}
