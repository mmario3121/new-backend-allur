<?php

namespace App\Http\Requests\Admin\FinancePage;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFinancePageRequest extends FormRequest
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
            'title' => 'nullable|string',
            'title_kz' => 'nullable|string',
            'image' => 'nullable|image',
            'text' => 'nullable|string',
            'text_kz' => 'nullable|string',
            'card1_title' => 'nullable|string',
            'card1_title_kz' => 'nullable|string',
            'card1_text' => 'nullable|string',
            'card1_text_kz' => 'nullable|string',
            'card2_title' => 'nullable|string',
            'card2_title_kz' => 'nullable|string',
            'card2_text' => 'nullable|string',
            'card2_text_kz' => 'nullable|string',
            'card3_title' => 'nullable|string',
            'card3_title_kz' => 'nullable|string',
            'card3_text' => 'nullable|string',
            'card3_text_kz' => 'nullable|string',
            'card4_title' => 'nullable|string',
            'card4_title_kz' => 'nullable|string',
            'card4_text' => 'nullable|string',
            'card4_text_kz' => 'nullable|string',
            'card5_title' => 'nullable|string',
            'card5_title_kz' => 'nullable|string',
            'card5_text' => 'nullable|string',
            'card5_text_kz' => 'nullable|string',
            'card5_subtitle' => 'nullable|string',
            'card5_subtitle_kz' => 'nullable|string',
            'card6_title' => 'nullable|string',
            'card6_title_kz' => 'nullable|string',
            'card6_text' => 'nullable|string',
            'card6_text_kz' => 'nullable|string',
            'card6_subtitle' => 'nullable|string',
            'card6_subtitle_kz' => 'nullable|string',
            'card7_title' => 'nullable|string',
            'card7_title_kz' => 'nullable|string',
            'card7_text' => 'nullable|string',
            'card7_text_kz' => 'nullable|string',
            'card7_subtitle' => 'nullable|string',
            'card7_subtitle_kz' => 'nullable|string',
            'card8_title' => 'nullable|string',
            'card8_title_kz' => 'nullable|string',
            'card8_text' => 'nullable|string',
            'card8_text_kz' => 'nullable|string',
            'card8_subtitle' => 'nullable|string',
            'card8_subtitle_kz' => 'nullable|string',
            'card9_title' => 'nullable|string',
            'card9_title_kz' => 'nullable|string',
            'card9_text' => 'nullable|string',
            'card9_text_kz' => 'nullable|string',
            'card9_subtitle' => 'nullable|string',
            'card9_subtitle_kz' => 'nullable|string',
            'block2_image' => 'nullable|image',
            'mini_card_5' => 'nullable|array',
            [
            'mini_card_5.field1' => 'nullable|string',
            'mini_card_5.field2' => 'nullable|string',
            'mini_card_5.field3' => 'nullable|string',
            'mini_card_5.field4' => 'nullable|string',
            ],
            'mini_card_6' => 'nullable|array',
            [
            'mini_card_6.field1' => 'nullable|string',
            'mini_card_6.field2' => 'nullable|string',
            'mini_card_6.field3' => 'nullable|string',
            'mini_card_6.field4' => 'nullable|string',
            ],
            'mini_card_7' => 'nullable|array',
            [
            'mini_card_7.field1' => 'nullable|string',
            'mini_card_7.field2' => 'nullable|string',
            'mini_card_7.field3' => 'nullable|string',
            'mini_card_7.field4' => 'nullable|string',
            ],
            'mini_card_8' => 'nullable|array',
            [
            'mini_card_8.field1' => 'nullable|string',
            'mini_card_8.field2' => 'nullable|string',
            'mini_card_8.field3' => 'nullable|string',
            'mini_card_8.field4' => 'nullable|string',
            ],
            'mini_card_9' => 'nullable|array',
            [
            'mini_card_9.field1' => 'nullable|string',
            'mini_card_9.field2' => 'nullable|string',
            'mini_card_9.field3' => 'nullable|string',
            'mini_card_9.field4' => 'nullable|string',
            ],
        ];
    }
}
