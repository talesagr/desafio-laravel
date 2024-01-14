<?php

use App\Http\Controllers\FindPeopleByTermController;
use App\Http\Controllers\FindPeopleController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PeopleCountController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::resource('/pessoas', PeopleController::class)->only(['index','create','store']);

Route::get('/', function () {
    return redirect('/pessoas');
});

//GET /pessoas?t=[:termo da busca] – para fazer uma busca por pessoas.
Route::get('/procurar?t={term}', [FindPeopleByTermController::class, 'show'])->name('term.show');
Route::get('/procurar/termo', [FindPeopleByTermController::class, 'index'])->name('term.index');
Route::post('/procurar/termo', [FindPeopleByTermController::class, 'store'])->name('term.store');

//GET /pessoas – busca todas as pessoas do banco.
Route::get('/pessoas', [PeopleController::class, 'index'])->name('people.index');

// GET /pessoas/[:id] – para consultar um recurso criado com a requisição anterior.
Route::get('/pessoas/{uuid}', [FindPeopleController::class, 'show'])->name('findpeople.show');
Route::get('/procurar/porid', [FindPeopleController::class, 'index'])->name('findpeople.index');
Route::post('/procurar/porid', [FindPeopleController::class, 'store'])->name('findpeople.store');

// GET /contagem-pessoas – endpoint especial para contagem de pessoas cadastradas.
Route::get('/contagem-pessoas',[PeopleCountController::class,'index'])->name('countpeople.index');

// POST /pessoas – para criar um recurso pessoa.
Route::post('/pessoas', [PeopleController::class, 'store'])->name('people.store');
Route::get('/adicionar', [PeopleController::class, 'create'])->name('people.create');
