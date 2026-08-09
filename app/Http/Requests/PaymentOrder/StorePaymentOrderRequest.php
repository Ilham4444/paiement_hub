<?php

namespace App\Http\Requests\PaymentOrder;

use App\Models\Association;
use App\Models\PersonnePhysique;
use App\Models\Societe;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class StorePaymentOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'reference' => ['required', 'string'],
            'title' => ['required', 'string', 'max:255'],
            'montant' => ['required', 'numeric', 'min:0.01'],
            'article_id' => ['required', 'exists:articles,id'],
            'platform_id' => ['required', 'exists:platforms,id'],
            'external_id' => ['required', 'string'],

            'beneficiary_type' => ['required', Rule::in([
                Association::class,
                Societe::class,
                PersonnePhysique::class,
            ])],
            'beneficiary_id' => ['required', 'integer'],

            'meta_data' => ['nullable', 'array'],
        ];
    }
}