<?php

namespace App\Http\Requests\Admin\Specification;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSpecificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'title_kz' => 'required',
            'value' => 'required',
            'value_kz' => 'required',
            'position' => 'required',
            'complectation_id' => 'required',
            'specification_category_id' => 'required',
        ];
    }
}
