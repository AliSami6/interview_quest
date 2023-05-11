<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest extends FormRequest
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
       $rules = [
           'name'         => ['required','string'],
           'email'         => ['required','email'],
           'other_info'         => ['required'],
        ];
          return $rules;
    }
      public function messages()
    {
        return [
            'name.required'         => 'The name field is required .',
            'name.string'           => 'the name must be an string',
            'email.required'     => 'The email field is required .',
            'other_info.required'      => 'The other_info field is required .',
        ];
    }
}