<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadProfilePictureRequest extends FormRequest
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
    public function rules()
    {
        return [
            'picture' => 'required|image|mimes:jpeg,png,jpg|max:2000',
        ];
    }

    public function messages()
    {
        return [
            'picture.required' => 'No file uploaded.',
            'picture.image' => 'The file must be an image.',
            'picture.mimes' => 'The file must be of type: jpeg, png, jpg.',
            'picture.max' => 'The file may not be greater than 2000 kilobytes.',
        ];
    }
}
