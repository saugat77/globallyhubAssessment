<?php

use App\Models\EducationBackgroundModel;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $educations = EducationBackgroundModel::all();
    if ($educations->isEmpty()) {
        // Run the seed command
        Artisan::call('db:seed');
    }

    return view('welcome', compact('educations'));
});

Route::get('/{pathMatch}', function () {
    return view('welcome');
})->where('pathMatch', ".*");
