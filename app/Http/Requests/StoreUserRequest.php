<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
    {//TODO: add requirements to password rule
        return [
            'username' => 'required|string|max:255',
            'email' => 'required|unique:users,email|regex:/(.+)@(.+)\.(.+)/i', //TODO: add regex to also check for symbols besides . and -
            'password' => 'required',
            'is_chef' => 'required|boolean',
            'department_id' => 'required|integer|exists:departments,id'
        ];
    }
}
