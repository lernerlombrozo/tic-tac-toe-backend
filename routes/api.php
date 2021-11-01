<?php

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/games', function () {
    return Game::create();
});

Route::get('/games/{id}', function () {
    return response([
        'name' => 'Abigail',
        'state' => 'CA',
    ], 200);
});

Route::post('/games', function () {
    return Game::create();
});

Route::put('/games/{id}', function () {
    return response([
        'name' => 'Abigail',
        'state' => 'CA',
    ], 200);
});

Route::delete('/games/{id}', function () {
    return response([
        'name' => 'Abigail',
        'state' => 'CA',
    ], 200);
});
