<?php

namespace App\Http\Requests\Admin\DealerAddress;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDealerAddressRequest extends FormRequest
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
            'address' => 'required',
            'address_kz' => 'required',
            'phone' => 'required',
            'worktime' => 'required',
            'worktime_kz' => 'required',
            'coordinates' => 'nullable',
        ];
    }
}
