<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends BaseFormRequest
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
            'name' => 'required|max:50',
            'email' => 'required|regex:/^[a-z0-9._%+-]+@[a-z0-9.-]{4,}\.[a-z]{2,}$/|distinct:users',
            'password' => 'min:8|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,20}$/|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name can`t be empty',
            'name.max' => 'Name can`t be more than 50 Characters',
            'email.required'=> 'Email can`t be empty',
            'email.regex'=> 'Email Address is not valid',
            'email.distinct' => 'Same email is not allowed',
            'password.min' => 'Password must be atleast 8 charcter long',
            'password.regex' => 'Password Must contain Atleast 1 Uppercase Letter, 1 LowerCase Letter, 1 Special Character, 1 Number and 8 character long',
            'password.confirmed' => 'Password must be same as above',
        ];
    }
}
