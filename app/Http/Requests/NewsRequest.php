<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
                $locale.'.title'=>'required|string|min:3|max:255|',
                $locale.'.description'=>'required|string',
                $locale.'.short_name'=>'required|string|min:3|max:5|',
            ];
        }
        return $rules;

    }
    public function langValidationUpdate(): array
    {
        $rules=[];
        foreach (config('translatable.locales') as $locale){
            $rules+=[
                $locale.'.title'=>'required|string|min:3|max:255|',

                $locale.'.description'=>'required|string',
                $locale.'.short_name'=>'required|string|min:3|max:5|',
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
        $rules = [
            'category_id'=>'required|exists:categories,id',
            'image'=>'image|mimes:jpg,jpeg,png,gif|max:2048',
        ];
        $rules += $this->langValidation();
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['image']='nullable|image|mimes:jpg,jpeg,png,gif|max:2048';
            $rules['category_id']='nullable|exists:categories,id';
            $rules= $this->langValidationUpdate();
        }
        return $rules;
    }
}
