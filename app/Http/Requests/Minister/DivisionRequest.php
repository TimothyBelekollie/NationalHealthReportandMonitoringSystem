<?php

namespace App\Http\Requests\Minister;

use Illuminate\Foundation\Http\FormRequest;

class DivisionRequest extends FormRequest
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
        'name'=>'required|unique:divisions,name,'. $this->route('id'),
      
        ];
    }

    public function messages(): array
    {
        return [
        'name.required'=>'Division field is require',
      
        ];
    }
}
