<?php

namespace App\Http\Requests\Admin\ArticleImage;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleImageRequest extends FormRequest
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'position' => 'nullable|numeric',
        ];
    }
}
