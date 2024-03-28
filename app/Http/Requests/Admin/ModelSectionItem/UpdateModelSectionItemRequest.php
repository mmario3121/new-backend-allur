<?php

namespace App\Http\Requests\Admin\ModelSectionItem;

use Illuminate\Foundation\Http\FormRequest;

class UpdateModelSectionItemRequest extends FormRequest
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
            'title' => 'required',
            'title_kz' => 'required',
            'text' => 'required',
            'text_kz' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ];
    }
}
