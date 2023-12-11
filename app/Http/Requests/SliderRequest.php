<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'image' => 'nullable',
            'image.*' => 'nullable|mimes:jpeg,png,jpg,gif,svg,mp4,mov,ogg,qt|max:20000',
            'video' => 'nullable',
            'video.*' => 'nullable|mimes:jpeg,png,jpg,gif,svg,mp4,mov,ogg,qt|max:20000',
            'type' => 'required|in:video,image',

        ];
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['image'] = 'nullable|mimes:jpeg,png,jpg,gif,svg,mp4,mov,ogg,qt|max:20000';
            $rules['video'] = 'nullable|mimes:jpeg,png,jpg,gif,svg,mp4,mov,ogg,qt|max:20000';
            $rules['type'] = 'required|in:video,image';
        }
        return $rules;
    }
}
