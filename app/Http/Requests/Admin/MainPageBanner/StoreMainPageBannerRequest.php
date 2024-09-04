<?php

namespace App\Http\Requests\Admin\MainPageBanner;

use Illuminate\Foundation\Http\FormRequest;

class StoreMainPageBannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized§ to make this request.
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
            'image' => '',
            'title' => '',
            'title_kz' => '',
            'description' => '',
            'description_kz' => '',
            'link' => '',
            'model_id' => 'exists:car_models,id|nullable',
        ];
    }
}
