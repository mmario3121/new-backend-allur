<?php

namespace App\Http\Requests\Admin\CareraBanner;

use Illuminate\Foundation\Http\FormRequest;

class StoreCareraBannerRequest extends FormRequest
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
            'image' => 'required|image',
            'title' => 'required|string',
            'title_kz' => 'required|string',
            'text' => 'required|string',
            'text_kz' => 'required|string',
        ];
    }
}
