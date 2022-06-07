<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [IdeaController::class, 'index'])
    ->name('ideas.index');
Route::get('/ideas/{idea}', [IdeaController::class, 'show'])
    ->name('ideas.show')
    ->where('idea', '[0-9]+');

Route::get('/ideas/create', [IdeaController::class, 'create'])
    ->name('ideas.create');
Route::post('ideas/store', [IdeaController::class, 'store'])
    ->name('ideas.store');

Route::get('/ideas/{idea}/edit', [IdeaController::class, 'edit'])
    ->name('ideas.edit')
    ->where('ideas', '[0-9]+');
Route::patch('/ideas/{idea}/update', [IdeaController::class, 'update'])
    ->name('ideas.update')
    ->where('ideas', '[0-9]+');

Route::delete('/ideas/{idea}/destroy', [IdeaController::class, 'destroy'])
    ->name('ideas.destroy')
    ->where('ideas', '[0-9]+');

Route::post('ideas/{idea}/comments', [CommentController::class, 'store'])
    ->name('comments.store')
    ->where('ideas', '[0-9]+');

Route::delete('comments/{comment}/destroy', [CommentController::class, 'destroy'])
    ->name('comments.destroy')
    ->where('comment', '[0-9]+');

Auth::routes();
