<?php

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

Route::get('/home', 'TodoController@listTask')->name('home');
Route::post('/add-task', 'TodoController@addTask');
Route::get('edit-task/{id}', 'TodoController@editTask');
Route::post('update-task/{id}', 'TodoController@updateTask');
Route::delete('delete-task/{id}', 'TodoController@destroy');
Route::get('complete-task/{id}', 'TodoController@completeTodo');