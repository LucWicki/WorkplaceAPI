<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'nullable|string|max:255',
            'email' => 'nullable|unique:users,email'.$this->user->id .'|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'nullable',
            'is_chef' => 'nullable|boolean',
            'department_id' => 'nullable|integer|exists:departments,id'
        ];
    }
}
