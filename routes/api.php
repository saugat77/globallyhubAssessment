<?php

use App\Http\Controllers\FormController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/form/store',[FormController::class,'store']);
Route::get('/form/get-countries',[FormController::class,'getCountries']);
Route::get('/form/get-education',[FormController::class,'getEducation']);
Route::get('/form/get-form-data',[FormController::class,'getFormData']);
// Route::get('/generate-csv', 'FormController@generate')->name('generate.csv');
