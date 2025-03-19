<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends FormRequest
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
    {//TODO: make a custom error message for unique
        return [
            'departmentname' => 'nullable|string|max:255|unique:departments,departmentname,'.$this->department->id,
            'departmentwebsite' => 'nullable|string', //TODO: maybe with regex or a website rule?
            'weekday_id' => 'nullable|integer|exists:weekdays,id',
        ];
    }
}
