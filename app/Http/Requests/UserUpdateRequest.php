<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return user()->can('user-add');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['nullable', 'email', ' unique:users,email' . $this->user->id],
            'phone' => ['nullable'],
            'address' => ['required', 'string'],
            'image' => ['nullable', 'image', ' mimes:jpeg,png,jpg,svg', 'max:2048'],
        ];
    }
}
