<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHumanitarianRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:1', 'max:255'],
            'content' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,jpg,JPG,png,webp,svg'],
            'date' => ['required', 'date'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}
