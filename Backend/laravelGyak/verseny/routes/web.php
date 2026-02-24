<?php

use App\Http\Controllers\Create;
use App\Http\Controllers\Dashboard;
use App\Models\Team;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

//DASHBOARD
Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
Route::get('/teams', [Dashboard::class, 'teams'])->name('dashboard.teams');
Route::get('/challenges', [Dashboard::class, 'challenges'])->name('dashboard.challenges');
Route::get('/submissions', [Dashboard::class, 'submissions'])->name('dashboard.submissions');


//CREATE
//Submission
Route::get('/submissions/create', [Create::class, 'submission'])->name('create.submission');
Route::post('/submissions', [Create::class, 'storeSubmission'])->name('store.submission');
Route::delete('/submissions/delete/{submission}', [Create::class, 'deleteSubmission'])->name('delete.submission');

//Team
Route::get('/teams/create', [Create::class, 'team'])->name('create.team');
Route::post('/teams', [Create::class, 'storeTeam'])->name('store.team');

//Challenges
Route::get('challenges/create', [Create::class, 'challenge'])->name('create.challenge');
Route::post('/challenges', [Create::class, 'storeChallenge'])->name('store.challenge');


//DETAILS
Route::get('/teams/{team}', [Dashboard::class, 'team'])->name('dashboard.team');
