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





// crud de /teams
Route::get('/teams', 
    [TeamController::class, 'index']
);
Route::post('/teams', 
    [TeamController::class, 'store']
);
Route::put('/teams/{id}', 
    [TeamController::class, 'update']
);
Route::delete('/teams/{id}', 
    [TeamController::class, 'destroy']
);



// crud de /presidents
Route::get('/presidents', 
    [PresidentController::class, 'index']
);
Route::post('/presidents', 
    [PresidentController::class, 'store']
);
Route::put('/presidents/{id}', 
    [PresidentController::class, 'update']
);
Route::delete('/presidents/{id}', 
    [PresidentController::class, 'destroy']
);
// crud de /players
Route::get('/players', 
    [PlayerController::class, 'index']
);
Route::post('/players', 
    [PlayerController::class, 'store']
);
Route::put('/players/{id}', 
    [PlayerController::class, 'update']
);
Route::delete('/players/{id}', 
    [PlayerController::class, 'destroy']
);

//crud de /games
Route::get('/games', 
    [GameController::class, 'index']
);
Route::post('/games', 
    [GameController::class, 'store']
);
Route::put('/games/{id}', 
    [GameController::class, 'update']
);
Route::delete('/games/{id}', 
    [GameController::class, 'destroy']
);


// crud de /teamGames
Route::get('/teamGames', 
    [TeamGameController::class, 'index']
);
Route::post('/teamGames', 
    [TeamGameController::class, 'store']
);
Route::put('/teamGames/{id}', 
    [TeamGameController::class, 'update']
);
Route::delete('/teamGames/{id}', 
    [TeamGameController::class, 'destroy']
);

// crud de /goals
Route::get('/goals', 
    [GoalController::class, 'index']
);
Route::post('/goals', 
    [GoalController::class, 'store']
);
Route::put('/goals/{id}', 
    [GoalController::class, 'update']
);
Route::delete('/goals/{id}', 
    [GoalController::class, 'destroy']
);

