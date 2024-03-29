<?php

declare(strict_types=1);

namespace App\Request;

use Hyperf\Validation\Request\FormRequest;

class UserRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'id' => '',
            'name' => 'required|max:255',
            'email' => 'required|email',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' =>'name is required',
            'name.max' =>'name is required',
            'email.required' =>'email is required',
        ];
    }
}
