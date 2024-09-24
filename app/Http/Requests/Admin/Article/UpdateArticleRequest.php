<?php

namespace App\Http\Requests\Admin\Article;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
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
            'title' => 'required|array',
            'title.*' => 'max:255',

            'description' => 'required|array',
            'description.*' => 'required',
            'description_mob' => 'required|array',
            'description_mob.*' => 'required',
            'time' => 'required|date',
            'isForm' => 'nullable|boolean',
            'model_id' => 'nullable|integer',
            'isFinance' => 'nullable|boolean',
            'isMainPage' => 'nullable|boolean',
            'isSlider' => 'nullable|boolean',
            'isAbout' => 'nullable|boolean',
            'isProduction' => 'nullable|boolean',
            'type' => 'required|string',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',

            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'image_kz' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ];
    }
}
