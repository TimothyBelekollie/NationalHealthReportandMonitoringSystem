<?php

namespace App\Http\Requests\Minister;

use Illuminate\Foundation\Http\FormRequest;

class HealthOfficerRequest extends FormRequest
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
        'name'=>'required',
        'role_id'=>'required',
        'email'=>'required|unique:users,name,'. $this->route('id'),
        'division_id'=>'required'
      
        ];
    }

    public function messages(): array
    {
        return [
        'name.required'=>'Name field is require',
        'role_id.required'=>'Role field is required',
        'email.required'=>'Email field is required',
        'division_id.required'=>'Division field is required'
        ];
    }
}
