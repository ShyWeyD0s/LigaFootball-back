<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PresidentController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\TeamGameController;
use App\Http\Controllers\GoalController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Route::get('categories', [CategoryController::class,'index'])->name('api.v1.categories.index');

// crud de /teams
Route::get('/teams', [TeamController::class, 'index'])->name('api.v1.teams.index');
//show de equipo por id
Route::get('/teams/{id}', [TeamController::class, 'show'])->name('api.v1.teams.show');
//store de equipo
Route::post('/teams', [TeamController::class, 'store'])->name('api.v1.teams.store');
//update de equipo por id
Route::put('/teams/{id}', [TeamController::class, 'update'])->name('api.v1.teams.update');
//delete de equipo por id
Route::delete('/teams/{id}', [TeamController::class, 'destroy'])->name('api.v1.teams.destroy');




// crud de /presidents

//index de presidentes
Route::get('/presidents', [PresidentController::class, 'index'])->name('api.v1.presidents.index');
//show de president por id
Route::get('/presidents/{id}', [PresidentController::class, 'show'])->name('api.v1.presidents.show');
//store de president
Route::post('/presidents', [PresidentController::class, 'store'])->name('api.v1.presidents.store');
//update de president por id
Route::put('/presidents/{id}', [PresidentController::class, 'update'])->name('api.v1.presidents.update');
//delete de president por id
Route::delete('/presidents/{id}', [PresidentController::class, 'destroy'])->name('api.v1.presidents.destroy');


// crud de /players
//index de jugadores
Route::get('/players', [PlayerController::class, 'index'])->name('api.v1.players.index');
//show de jugador por id
Route::get('/players/{id}', [PlayerController::class, 'show'])->name('api.v1.players.show');
//store de jugador
Route::post('/players', [PlayerController::class, 'store'])->name('api.v1.players.store');
//update de jugador por id
Route::put('/players/{id}', [PlayerController::class, 'update'])->name('api.v1.players.update');
//delete de jugador por id
Route::delete('/players/{id}', [PlayerController::class, 'destroy'])->name('api.v1.players.destroy');

//crud de /games

//index de juegos
Route::get('/games', [GameController::class, 'index'])->name('api.v1.games.index');
//show de game por id
Route::get('/games/{id}', [GameController::class, 'show'])->name('api.v1.games.show');
//store de game
Route::post('/games', [GameController::class, 'store'])->name('api.v1.games.store');
//update de game por id
Route::put('/games/{id}', [GameController::class, 'update'])->name('api.v1.games.update');
//delete de game por id
Route::delete('/games/{id}', [GameController::class, 'destroy'])->name('api.v1.games.destroy');


// crud de /teamGames

//index de teamGames
Route::get('/teamGames', 
    [TeamGameController::class, 'index'])->name('api.v1.teamGames.index');
//store de teamGames
Route::post('/teamGames', 
    [TeamGameController::class, 'store'])->name('api.v1.teamGames.store');
Route::put('/teamGames/{id}', 
    [TeamGameController::class, 'update'])->name('api.v1.teamGames.update');
Route::delete('/teamGames/{id}', 
    [TeamGameController::class, 'destroy'])->name('api.v1.teamGames.destroy');

// crud de /goals
Route::get('/goals', 
    [GoalController::class, 'index'])->name('api.v1.goals.index');
Route::post('/goals', 
    [GoalController::class, 'store'])->name('api.v1.goals.store');
Route::put('/goals/{id}', 
    [GoalController::class, 'update'])->name('api.v1.goals.update');
Route::delete('/goals/{id}', 
    [GoalController::class, 'destroy'])->name('api.v1.goals.destroy');

