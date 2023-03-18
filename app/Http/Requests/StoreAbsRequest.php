<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAbsRequest extends FormRequest
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
            'type' => ['required', 'integer'],
            'date' => ['required', 'date'],
            'nbdays' => ['required', 'integer'],
        ];
    }
}
