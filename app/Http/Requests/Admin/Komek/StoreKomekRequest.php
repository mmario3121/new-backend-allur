<?php

namespace App\Http\Requests\Admin\Komek;

use Illuminate\Foundation\Http\FormRequest;

class StoreKomekRequest extends FormRequest
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
            'title' => 'required|max:256',
            'title_kz' => 'required|max:256',
            'text' => 'required',
            'text_kz' => 'required',
            'image' => 'required|image',
            'form_image' => 'required|image',
        ];
    }
}
