<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
        $rules =  [
            'video' => 'required|mimes:mp4,mov,ogg,qt|max:20000',
        ];
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['video'] = 'required|mimes:mp4,mov,ogg,qt|max:20000';
        }
        return $rules;
    }
}
