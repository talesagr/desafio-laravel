<?php

namespace App\Repositories;

use App\Http\Requests\PeopleFormRequest;
use App\Models\Pessoa;

interface PeopleRepository
{
    public function add(PeopleFormRequest $request) : Pessoa;
}
