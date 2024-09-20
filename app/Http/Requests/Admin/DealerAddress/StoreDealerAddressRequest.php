<?php

namespace App\Http\Requests\Admin\DealerAddress;

use Illuminate\Foundation\Http\FormRequest;

class StoreDealerAddressRequest extends FormRequest
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
            'dealer_id' => 'required',
            'address' => 'required',
            'address_kz' => 'required',
            'address2' => 'required',
            'address2_kz' => 'required',
            'worktime' => 'required',
            'worktime_kz' => 'required',
            'phone' => 'required',
            'coordinates' => 'required',
            'coordinates2' => 'required',
        ];
    }
}
