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

Route::resource('categorias', 'CategoriesController');
Route::resource('preguntas', 'QuestionsController');
Route::resource('usuarios', 'UsersController');
Route::resource('roles', 'RolesController');
Route::resource('permisos', 'PermissionsController');
Route::resource('programas', 'ProgramsController');
Route::resource('fichas', 'FilesController');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
