<?php

namespace App\Providers;

use App\Repositories\EloquentPeopleRepository;
use App\Repositories\PeopleRepository;
use Illuminate\Support\ServiceProvider;

class PeopleRepositoryProvider extends ServiceProvider
{
    public array $bindings = [
      PeopleRepository::class => EloquentPeopleRepository::class
    ];
}
