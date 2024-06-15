<?php

namespace App\Http\Requests\Admin\Article;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'title.*' => 'required|max:255',

            'description' => 'required|array',
            'description.*' => 'required',
            'description_mob' => 'required|array',
            'description_mob.*' => 'required',
            'time' => 'required|date',
            'isForm' => 'nullable|boolean',
            'model_id' => 'required|integer',
            'isFinance' => 'nullable|boolean',
            'isMainPage' => 'nullable|boolean',
            'type' => 'required|string',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'image_kz' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ];
    }
}
