<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotebookStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|min:3|max:150',
            'company' => 'nullable|string|min:3|max:60',
            'email' => 'required|email',
            'birthday' => 'nullable|date',
            'photo' => 'nullable|string',
            'phone' => 'required|string|size:10',
        ];
    }
}
