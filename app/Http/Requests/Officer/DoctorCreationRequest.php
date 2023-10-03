<?php

namespace App\Http\Requests\Officer;

use Illuminate\Foundation\Http\FormRequest;

class DoctorCreationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'name'=>'required',
            'email' => 'required|email|unique:users,email,' . $this->route('id'),
            'health_center_id'=>'required',
            'role_id'=>'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Doctor full name  field is required',
            'email.required' => 'Doctor Email field is required',
            'health_center_id.required' => 'Health Center field is required',
            'role_id.required' => 'User Role field is required',
        ];
    }
}
