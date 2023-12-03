<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();

// });
// Route::group(['middleware'=>'api'],function($routes){
//     Route::post('/question_insert',[QuestionController::class,'question_insert'])->name('question_insert');

// });

Route::post('/question_insert',[QuestionController::class,'question_insert'])->name('question_insert');
