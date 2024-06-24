<?php

namespace App\Http\Requests\Admin\ModelColor;

use Illuminate\Foundation\Http\FormRequest;

class UpdateModelColorRequest extends FormRequest
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
            // 'model_id' => 'required',
            'hex' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'title' => 'required|max:255',
            'title_kz' => 'nullable|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'position' => 'nullable',
        ];
    }
}
