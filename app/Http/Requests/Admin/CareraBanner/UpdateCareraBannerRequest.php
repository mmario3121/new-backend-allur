<?php

namespace App\Http\Requests\Admin\CareraBanner;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCareraBannerRequest extends FormRequest
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
            'image' => 'nullable|image',
            'title' => 'nullable|string',
            'title_kz' => 'nullable|string',
            'text' => 'nullable|string',
            'text_kz' => 'nullable|string',
        ];
    }
}
