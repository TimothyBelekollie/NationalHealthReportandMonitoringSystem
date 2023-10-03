<?php

namespace App\Http\Requests\Officer;

use Illuminate\Foundation\Http\FormRequest;

class HealthCenterRequest extends FormRequest
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
            'name' => 'required|unique:health_centers,name,' . $this->route('id'),
            'subdivision_id' => 'required',
            'health_center_type_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Health Center Name is required',
            'subdivision_id.required' => 'Health Center Immediate Division is required',
            'health_center_type_id.required' => 'Health Center Type is required',
        ];
    }
}
