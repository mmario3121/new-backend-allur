<?php

namespace App\Http\Requests\Admin\Application;

use App\Models\Application;
use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicationRequest extends FormRequest
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
        $statuses = implode(',', array_keys(Application::STATUSES));
        return [
            'name' => 'required|max:100',
            'phone' => 'required|max:100',
            'email' => 'nullable|max:100',
            'city_id' => 'required|exists:cities,id',
            'comment' => 'nullable|max:10000',
            'status' => 'required|in:' . $statuses,
        ];
    }
}
