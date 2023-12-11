<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function langValidation(): array
    {
        $rules=[];
        foreach (config('translatable.locales') as $locale){
            $rules+=[
                $locale.'.name'=>'required|string|min:3|max:255|',

            ];
        }
        return $rules;

    }
    public function langValidationUpdate(): array
    {
        $rules=[];
        foreach (config('translatable.locales') as $locale){
            $rules+=[
                $locale.'.name'=>'required|string|min:3|max:255|',


            ];
        }
        return $rules;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $rules=  [

            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ];
        $rules += $this->langValidation();
        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $rules['image'] = 'nullable|image|mimes:jpg,jpeg,png';
            $rules= $this->langValidationUpdate();
        }
        return $rules;
    }
}
