<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreATRequest extends FormRequest
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
            'accdate' => ['required', 'date'],
            'decdate' => ['required', 'date'],
            'place' => ['required', 'boolean'],
            'commentary' => ['required', 'string'],
            'lesion' => ['required', 'string'],
            'begdate' => ['date'],
            'enddate' => ['date'],
            'CPAM' => ['required', 'boolean'],
        ];
    }
}
