<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Matches;
use App\Models\Team;
use App\Models\User;
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
// alle items
Route::get('/Match/all', function(){
    return Matches::all();
});
Route::get('/Team/all', function(){
    return Team::all();
});
Route::get('/User/all', function(){
    return User::all();
});
// individuele items
Route::get('/Match/{id}', function($id){
    return Matches::find($id);
});
Route::get('/Team/{id}', function($id){
    return Team::find($id);
});
Route::get('/User/{id}', function($id){
    return User::find($id);
});



