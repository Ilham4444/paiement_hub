<?php

namespace App\Http\Requests\PersonnePhysique;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonnePhysiqueRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['nullable', 'integer'],
            'cin' => ['required', 'string', 'unique:personne_physiques,cin'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string'],
            'email' => ['nullable', 'email'],
            'address' => ['nullable', 'string'],
        ];
    }
}