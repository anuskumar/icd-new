<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'phone_no' => 'required|digits:10|unique:users,phone_no',


        ];
    }

  public function messages()
{
    return [
        'phone_no.required' => 'Phone number is required.',
        'phone_no.digits' => 'Phone number must be exactly 10 digits.',
        'phone_no.unique' => 'This phone number is already registered.',
        'email.unique' => 'This Email is already registered.',
    ];
}

}
