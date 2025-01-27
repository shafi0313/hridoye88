<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLiteratureRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'min:1', 'max:255'],
            'writer' => ['required', 'string', 'min:1', 'max:255'],
            'price' => ['nullable', 'numeric'],
            'discount' => ['nullable', 'numeric'],
            'description' => ['nullable', 'string', 'min:1'],
            'publisher' => ['nullable', 'string', 'min:1', 'max:255'],
            'published_at' => ['nullable', 'date'],
            'cover_img' => ['nullable', 'image', ' mimes:jpeg,png,jpg,svg,webp'],
            'back_cover_img' => ['nullable', 'image', ' mimes:jpeg,png,jpg,svg,webp'],
            'pdf' => ['nullable', 'file', 'mimes:pdf']
        ];
    }
}
