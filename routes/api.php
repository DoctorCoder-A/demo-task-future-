<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('notebook', [\App\Http\Controllers\NotebookController::class, 'index'])
    ->name('notebook.index');

Route::get('notebook/{id}', [\App\Http\Controllers\NotebookController::class, 'show'])
    ->name('notebook.show');

Route::group(['middleware' => 'auth'], function () {

    Route::post('notebook', [\App\Http\Controllers\NotebookController::class, 'store'])
        ->name('notebook.store');

    Route::patch('notebook/{id}', [\App\Http\Controllers\NotebookController::class, 'update'])
        ->name('notebook.update');

    Route::delete('notebook1/{id}', [\App\Http\Controllers\NotebookController::class, 'destroy'])
        ->name('notebook.destroy');
});
