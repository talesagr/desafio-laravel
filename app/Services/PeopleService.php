<?php

namespace App\Services;

use App\Models\Pessoa;
use Carbon\Carbon;
use http\Client\Response;
use Illuminate\Support\Facades\Cache;

class PeopleService
{

    public function getByUuid(string $uuid)
    {
        return Pessoa::where('uuid',$uuid)->first();
    }

    public function create(array $data)
    {

        $formatted = [
            'uuid' => uuid_create(),
            'apelido' => $data['apelido'],
            'nome' => $data['nome'],
            'nascimento' => Carbon::createFromFormat('Y-m-d', $data['nascimento']),
            'stack' => $data['stack']
        ];

        $people = Pessoa::create($formatted);

        $peopleCacheData = json_encode($people->toArray());
        Cache::set('people.' . $people['uuid'], $peopleCacheData, now()->day);
        Cache::set('people' . $people['apelido'], $peopleCacheData, now()->day);

        return $people;
    }

    public function count()
    {
        return Pessoa::query()->count();
    }

    public function findAll()
    {
        return Pessoa::all();
    }

    public function getByTerm(string $termo, int $limit = 50)
    {
        return Pessoa::query()
            ->where('apelido', 'LIKE', "%$termo%")
            ->orWhere('nome', 'LIKE', "%$termo%")
            ->orWhere('stack', 'LIKE', "%$termo%")
            ->limit($limit)
            ->get();
    }
}
