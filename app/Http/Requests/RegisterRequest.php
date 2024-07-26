<?php

namespace App\Http\Requests;

// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;


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
            "name" => "required|string|max:255",
            "email" => "required|string|lowercase|email|max:255|unique:users",
            "password" => [
                "required",
                "confirmed",
                Password::default(),
                // Password::min(8)->mixedCase()->numbers()->symbols()
            ],
        ];
    }

    /**
     * Une fonction qui s'exécute après la validation
     * des donneés
     * @return array
     */

    // public function after(): array {
    //     return [
    //         function (Validator $validator){
    //             if (!$validator->fails()) {
    //                 // Encrypt le mot de passe
    //                 $this->merge([
    //                     'password' =>bcrypt($this->password)
    //                 ]);
    //             }
    //         }
    //     ];
    // }
}
