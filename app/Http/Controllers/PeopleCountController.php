<?php

namespace App\Http\Controllers;

use App\Services\PeopleService;

class PeopleCountController extends Controller
{
    public function index(PeopleService $personService)
    {
        $result = $personService->count();

        return view('countpeople.index')
            ->with('result',$result);
    }
}
