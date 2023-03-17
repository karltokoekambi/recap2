<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContractRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'employee' => ['required', 'integer'],
            'reception' => ['required', 'date'],
            'effect' => ['required', 'date'],
            'hours' => ['required', 'decimal:2', 'min:0', 'max:152'],
        ];
    }
}
