<?php

namespace App\Http\Requests;

use App\Models\Person;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProcessSessionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'payer.name' => ['required', 'string', 'max:80'],
            'payer.surname' => ['required', 'string', 'max:80'],
            'payer.documentType' => ['required', Rule::in(Person::DOCUMENT_TYPES)],
            'payer.document' => ['required', 'string', 'max:20'],
            'payer.email' => ['required', 'email', 'max:120'],
            'payer.mobile' => ['required', 'string', 'max:20'],
            'instrument.paymentMethodId' => ['required', 'exists:payment_methods,id'],
            'instrument.card.number' => ['required', 'numeric', 'digits_between:10,19'],
            'instrument.card.cvv' => ['numeric', 'digits:3'],
            'instrument.card.expiration' => ['regex:/(^(0[1-9])|(1[1,2]))\/([2-9][0-9])$/'],
        ];
    }
}
