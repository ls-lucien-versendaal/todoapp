<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard',[TasksController::class, 'index'])->name('dashboard');

    Route::group(['prefix'=>'task'], function(){
        Route::get('/create',[TasksController::class, 'create'])->name('task.create');
        Route::post('/create',[TasksController::class, 'store'])->name('task.store');

        Route::get('/{task}', [TasksController::class, 'edit'])->name('task.edit');
        Route::post('/{task}', [TasksController::class, 'update'])->name('task.update');

        Route::delete('/{task}/delete', [TasksController::class,'destroy'])->name('task.destroy');
    });
});



