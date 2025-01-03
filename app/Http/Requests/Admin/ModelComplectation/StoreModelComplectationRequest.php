<?php

namespace App\Http\Requests\Admin\ModelComplectation;

use Illuminate\Foundation\Http\FormRequest;

class StoreModelComplectationRequest extends FormRequest
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
            'title' => 'required|max:255',
            'price' => 'nullable',
            'is_active' => 'nullable|boolean',
        ];
    }
}
