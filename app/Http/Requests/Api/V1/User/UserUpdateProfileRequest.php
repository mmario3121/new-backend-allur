<?php

namespace App\Http\Requests\Api\V1\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class UserUpdateProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Request $request): array
    {
//        $user = $request->user();

        return [
            'name' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp,svg|max:4096',
//            'phone' => ['required', Rule::unique('users')->ignore($user->id)->whereNull('deleted_at')],
//            'email' => ['nullable', 'string', Rule::unique('users')->ignore($user->id)->whereNull('deleted_at')],
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
