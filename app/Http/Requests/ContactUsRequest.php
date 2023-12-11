<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
           'email' => 'required|email|unique:contact_us,email',
           'phone' => 'required|numeric|unique:contact_us,phone|digits_between:11,14',
           'Fax' => 'required|string',
           'POBox' => 'required|string',
           'Box_no' => 'required|string',
           'zip_code' => 'required|string',

       ];
       if (in_array($this->method(), ['PUT', 'PATCH'])) {


           $rules['email'] = 'required|email|unique:contact_us,email,' . $this->contactU . ',id';
           $rules['phone'] = 'required|numeric|digits_between:11,14|unique:contact_us,phone,' . $this->contactU . ',id';
           $rules['Fax'] = 'required|string';
           $rules['POBox'] = 'required|string';
           $rules['Box_no'] = 'required|string';
           $rules['zip_code'] = 'required|string';

       }
       return $rules;
    }
}
