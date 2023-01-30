<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\WedstrijdController;
use Illuminate\Support\Facades\Route;
use App\Models\Team;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'welcome'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Stuur de gebruiker naar de pagina waar hij kan zien welke teams hij heeft aangemaakt
    // route::get('/teams', [TeamsController::class, 'index'])->name('teams.overzicht');
    Route::get('/teams/wedstrijden', [WedstrijdController::class, 'index'])->name('wedstrijd.overzicht');
    Route::put('/teams/wedstrijden/editscores/{matchId}', [WedstrijdController::class, 'editScores'])->name('wedstrijd.editScores');
    Route::put('/teams/wedstrijden/editscores/save/{matchId}', [WedstrijdController::class, 'saveEditedScores'])->name('wedstrijd.saveEditScores');
    Route::put('/teams/wedstrijden/generate', [WedstrijdController::class, 'generate'])->name('teams.generateMatches');
    Route::delete('/teams/{teamId}/delete', [TeamsController::class, 'destroyTeammate'])->name('teams.destroyTeammate');

    Route::resource('/teams', TeamsController::class);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
