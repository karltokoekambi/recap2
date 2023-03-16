<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use function PHPUnit\Framework\isEmpty;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string','min:1', 'max:64'],
            'firstname' => ['required', 'string', 'min:1', 'max:64'],
            'birthdate' => ['required', 'date'],
            'indate' => ['required', 'date'],
            'poste' => ['required', 'integer'],
            'rqth' => ['nullable', 'date'],
            'nationality' => ['nullable','string', 'min:1', 'max:120'],
            'startvisa' => ['nullable', 'date'],
            'endvisa' => ['nullable', 'date',Rule::requiredIf(!isEmpty($this->request->get('nationality')))],
            'numSec' => ['nullable', 'integer','min_digits:10','max_digits:10',Rule::requiredIf(!isEmpty($this->request->get('nationality')))],
        ];
    }
}
