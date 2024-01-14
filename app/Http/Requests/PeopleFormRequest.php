<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeopleFormRequest extends FormRequest
{

    public function authorize():bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'apelido' => ['required','string', 'max:32',],
            'nome' => ['required', 'string', 'max:100'],
            'nascimento' => ['required', 'date_format:Y-m-d'],
            'stack' => ['sometimes', 'array', 'nullable'],
            'stack.*' => ['string', 'max:32']
        ];
    }
}
