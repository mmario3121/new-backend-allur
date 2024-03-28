<?php

namespace App\Http\Requests\Admin\DealerSeo;

use Illuminate\Foundation\Http\FormRequest;

class StoreDealerSeoRequest extends FormRequest
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
            'code' => 'nullable',
            'position' => 'required',
            'dealer_id' => 'required',
        ];
    }
}
