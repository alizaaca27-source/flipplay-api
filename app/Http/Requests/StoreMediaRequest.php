<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', 'unique:media,title'],
            'type' => ['required', Rule::in(['movie', 'series'])],
            'description' => ['nullable', 'string'],
            'release_year' => ['nullable', 'integer', 'min:1888', 'max:' . (date('Y') + 1)],
        ];
    }
}
