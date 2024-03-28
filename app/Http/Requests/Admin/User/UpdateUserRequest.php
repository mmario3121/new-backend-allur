<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->route('user')->id;

        return [
            'name' => 'required|string|min:3|max:255',
            'password' => 'nullable|min:4|max:255',
            'email' => "required|email|min:3|max:255|unique:users,email,{$userId}",
            'phone' => "nullable|min:4|max:255|unique:users,phone,{$userId}",
            'role' => 'required|in:dealer,admin,manager',
            'city_id' => 'nullable|exists:cities,id',
        ];
    }
}
