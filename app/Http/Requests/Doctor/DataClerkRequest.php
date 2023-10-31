<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class DataClerkRequest extends FormRequest
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
            'role_id'=>'required',
            'usertype'=>'required'
        ]
        ;
    }
    public function messages(): array
{
    return [
        'name.required' => 'Data Clerk full name  field is required',
        'email.required' => 'Email field is required',
        'health_center_id.required' => 'Health Center field is required',
        'role_id.required' => 'User Role field is required',
        'usertype.required' => 'Employee Type field is required',
    ];
}
}
