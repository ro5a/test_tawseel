<?php

namespace App\Http\Requests;

use App\Http\Controllers\Enum\ERRORMESSAGE;
use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:20'],
            'email' => ['required_if:role,admin', 'email', 'unique:users,email'],
            'phone' => ['required','numeric', 'regex:/^(01[0-9]{6})|(7|10)[0-9]{8}$/','unique:users,phone'],
            'password' => ['required_if:role,admin', 'min:5'],
            'confirm_password' => ['required_if:role,admin', 'same:password'],
        ];
    }

    
}
