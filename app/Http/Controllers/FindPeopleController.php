<?php

namespace App\Http\Controllers;

use App\Services\PeopleService;
use Illuminate\Http\Request;

class FindPeopleController
{
    public function __construct(private PeopleService $peopleService)
    {
    }

    public function index(Request $request)
    {
        return view('findpeople.index');
    }

    public function store(Request $request)
    {
        $uuid = $request->input('uuid');
        return redirect()->route('findpeople.show',[$uuid]);
    }

    public function show(string $uuid)
    {
        $people = $this->peopleService->getByUuid($uuid);
        if(!$people) {
            return view('people.notfound');
        }

        return view('findpeople.show')->with('people',$people);
    }
}
