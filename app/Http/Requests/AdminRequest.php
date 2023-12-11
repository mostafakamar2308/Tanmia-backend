<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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

        $rules = [
            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required|string|min:8|confirmed'],


        ];
        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $admin = $this->route()->parameter('user');

            $rules['name'] = ['required', 'string', 'max:255'];
            $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $admin];

        }

        return $rules;
    }


}
