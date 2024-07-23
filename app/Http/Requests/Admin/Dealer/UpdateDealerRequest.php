<?php

namespace App\Http\Requests\Admin\Dealer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDealerRequest extends FormRequest
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
            'name' => 'required|max:256',
            'name_kz' => 'required|max:256',
            'url' => 'nullable|max:256',
            'bitrix_id' => 'required',
            'city_id' => 'required',
            'brand_id' => 'nullable',
        ];
    }
}
