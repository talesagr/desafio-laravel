<?php

namespace App\Http\Controllers;

use App\Services\PeopleService;
use Illuminate\Http\Request;

class FindPeopleByTermController extends Controller
{
    public function __construct(private PeopleService $peopleService)
    {
    }

    public function index()
    {
        return view('term.index');
    }

    public function store(Request $request)
    {
        $term = $request->input('term');
        $peoples = $this->peopleService->getByTerm($term);
        if (!$peoples){
            return view('components.notfound');
        }
        return view('findpeople.show')->with('peoples',$peoples);
    }
}
