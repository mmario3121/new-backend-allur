<?php

namespace App\Http\Requests\Admin\Spec;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpecRequest extends FormRequest
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
            'type' => 'required|string',
            'value' => 'required|string',
            'value_kz' => 'required|string',
            'complectation_id' => 'required|integer',
        ];
    }
}
