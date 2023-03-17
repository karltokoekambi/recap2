<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDiscRequest extends FormRequest
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
            'convgiven' => ['required', 'date'],
            'convdate' => ['required', 'date'],
            'allegedfacts' => ['required', 'string', 'min:1', 'max:255'],
            'sanction' => ['required', 'string', 'min:1', 'max:100'],
            'notifdate' => ['required', 'date'],
            ];
    }
}
