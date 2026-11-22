<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $media = $this->route('media');

        return [
            'title' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('media', 'title')->ignore($media),
            ],
            'type' => ['sometimes', 'required', Rule::in(['movie', 'series'])],
            'description' => ['sometimes', 'nullable', 'string'],
            'release_year' => [
                'sometimes',
                'nullable',
                'integer',
                'min:1888',
                'max:' . (date('Y') + 1),
            ],
        ];
    }
}
