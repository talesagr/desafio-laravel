<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Pessoa extends Model
{
    use HasFactory;

    protected $primaryKey = 'uuid';
    protected $fillable = ['uuid','apelido','nome','nascimento','stack'];

    protected $casts = [
        'stack' => 'json',
        'nascimento' => 'date'
    ];

    protected static function booted()
    {
        self::addGlobalScope('ordered', function (Builder $queryBuilder){
           $queryBuilder->orderBy('nome');
        });
    }
}
