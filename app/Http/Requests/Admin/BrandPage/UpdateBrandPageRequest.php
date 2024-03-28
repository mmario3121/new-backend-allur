<?php

namespace App\Http\Requests\Admin\BrandPage;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandPageRequest extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image',
            'brand_id' => 'required|integer'
        ];
    }
}
