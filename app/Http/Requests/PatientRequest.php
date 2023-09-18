<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'gender'=>'required',
            'dob'=>'required',
           
            'health_center_id'=>'required',
            'nationality'=>'required',
            'contact'=>'required',
            'emmergency_contact'=>'required',
            'community'=>'required',
            'subdivision_id'=>'required',
            'city'=>'required',
            


        ];
    }
    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array<string, string>
 */
public function messages(): array
{
    return [
        'name.required' => 'Patient fullname field is required',
        'gender.required' => 'Patient gender field is required',
        'address.required' => 'Patient address field is required',
        'dob.required' => 'Patient date of birth field is required',
        'Health_center_id'=>'Health Center field is required',
        'subdivision_id'=>'Sub division field is required'
    ];
}
}
