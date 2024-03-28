<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class PaymentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'payment_card' => 'required|in:halykpay,kaspi',

            'products.*.type_id' => 'required',
            'products.*.type_name' => 'required|in:guide,course,subscription,additional',
            'products.*.type_time' => 'nullable|in:1,3,6,12,infinite',
            'products.*.type_value' => 'nullable|in:0,1',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => trans('errors.error_validation'),
            'errors' => $validator->errors(),
        ], Response::HTTP_BAD_REQUEST));
    }
}
