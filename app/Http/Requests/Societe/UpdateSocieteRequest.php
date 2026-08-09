<?php

namespace App\Http\Requests\Societe;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSocieteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:255'],
            'phone' => ['nullable', 'string'],
            'email' => ['nullable', 'email'],
        ];
    }
}