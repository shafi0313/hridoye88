<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserStoreRequest extends FormRequest
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
            'name'       => ['required', 'string', 'max:100'],
            'email'      => ['required', 'email', ' unique:users', 'email'],
            'phone'      => ['nullable'],
            'address'    => ['required', 'string'],
            'permission' => ['required', 'in:0,1,2,3'],
            'image'      => ['nullable', 'image', ' mimes:jpeg,png,jpg,svg,webp'],
            'password'   => ['required', 'confirmed', Password::min(6)],
        ];
    }
}
