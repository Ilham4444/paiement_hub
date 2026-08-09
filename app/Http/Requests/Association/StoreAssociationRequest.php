<?php

namespace App\Http\Requests\Association;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssociationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['nullable', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'date_depot' => ['required', 'date'],
        ];
    }
}