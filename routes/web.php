<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $surveys = auth()->user()->surveys;
    
    return view('dashboard', compact('surveys'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/survey/create', [SurveyController::class, 'create'])->name('create_survey');
Route::post('/survey', [SurveyController::class, 'store']);
Route::get('/survey/{survey}', [SurveyController::class, 'show']);

Route::get('/survey/{survey}/questions/create', [QuestionController::class, 'create']);
Route::post('/survey/{survey}/questions', [QuestionController::class, 'store']);

Route::get('/surveys/{survey}-{slug}', [PollController::class, 'show']);
Route::post('/surveys/{survey}-{slug}', [PollController::class, 'store']);