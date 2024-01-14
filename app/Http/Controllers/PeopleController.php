<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeopleFormRequest;
use App\Models\Pessoa;
use App\Services\PeopleService;
use Illuminate\Http\Request;

class PeopleController extends Controller
{

    public function __construct(private PeopleService $peopleService)
    {
    }

    public function index(Request $request)
    {
        $peoples = $this->peopleService->findAll();

        return view('people.index')
            ->with('peoples',$peoples);
    }

    public function create()
    {
        return view('people.create');
    }

    public function store(PeopleFormRequest $request)
    {
        $this->peopleService->create($request->validated());

        return to_route('people.index');
    }

}
