<?php

namespace App\Http\Requests\Admin\SpecificationCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpecificationCategoryRequest extends FormRequest
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
            'model_id' => 'required',
            'title' => 'required',
            'title_kz' => 'required',
            'position' => 'nullable',
        ];
    }
}
