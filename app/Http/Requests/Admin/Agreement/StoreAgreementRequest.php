<?php

namespace App\Http\Requests\Admin\Agreement;

use App\Models\Agreement;
use Illuminate\Foundation\Http\FormRequest;

class StoreAgreementRequest extends FormRequest
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
        $types = implode(',', array_keys(Agreement::TYPES));
        return [
            'file' => 'required|array',
            'file.*' => 'nullable|mimes:doc,docx,pdf|max:5120',
            'type' => 'required|in:' . $types
        ];
    }
}
