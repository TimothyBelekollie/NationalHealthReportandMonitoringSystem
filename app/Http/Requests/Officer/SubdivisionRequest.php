<?php

namespace App\Http\Requests\Officer;

use Illuminate\Foundation\Http\FormRequest;

class SubdivisionRequest extends FormRequest
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
        'name'=>'required|unique:subdivisions,name,'. $this->route('id'),
        'division_id'=>'required'
        ];
    }

    public function messages(): array
    {
        return [
        'name.required'=>'Sub division field is require',
        'division_id'=>'Division field is required'
        ];
    }

   
}
