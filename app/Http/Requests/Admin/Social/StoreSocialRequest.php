<?php

namespace App\Http\Requests\Admin\Social;

use Illuminate\Foundation\Http\FormRequest;

class StoreSocialRequest extends FormRequest
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
        
        //title, title_kz, text, text_kz, image, type
        return [
            'title' => 'required|max:256',
            'title_kz' => 'required|max:256',
            'text' => 'required',
            'text_kz' => 'required',
            'image' => 'required|image',
            'type' => 'required',
        ];
    }
}
