<?php

use Illuminate\Http\Request;

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

Route::apiResource('users', 'Api\UserController');
Route::apiResource('quizzes', 'Api\QuizzController');
Route::apiResource('questions', 'Api\QuestionController');
Route::apiResource('classrooms', 'Api\ClassroomController');

/* 
Inscription
Login
quizzes::all()
Inscription d'un eleve d'une classe
un eleve peut quitter une classe

enlever des eleves d'une classe

*/
