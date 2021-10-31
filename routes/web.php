<?php

use Illuminate\Support\Facades\Route;
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
Auth::routes();


Route::group(['middleware'=>['auth','isAdmin']],function (){
    //project
    Route::get('/projects', [App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('projects');
    Route::get('/project-add', [App\Http\Controllers\Admin\ProjectController::class, 'add'])->name('project-add');
    Route::post('/project-save', [App\Http\Controllers\Admin\ProjectController::class, 'save'])->name('project-save');
    Route::get('/project-edit/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'edit'])->name('project-edit');
    Route::post('/project-update', [App\Http\Controllers\Admin\ProjectController::class, 'update'])->name('project-update');
    Route::post('/project-delete', [App\Http\Controllers\Admin\ProjectController::class, 'delete'])->name('project-delete');
    Route::get('/project-show/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'show'])->name('project-show');
    Route::get('/search', [App\Http\Controllers\Admin\ProjectController::class, 'search'])->name('search');

});

