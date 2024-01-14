<?php

namespace App\Repositories;

use App\Http\Requests\PeopleFormRequest;
use App\Models\Pessoa;
use Illuminate\Support\Facades\DB;

class EloquentPeopleRepository implements PeopleRepository
{

    public function add(PeopleFormRequest $request): Pessoa
    {
        return Pessoa::create($request->validated());
    }
}
