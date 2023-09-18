<?php

namespace App\Http\Requests\Clerk;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' =>'required|same:newpassword',
               ];
    }
}
