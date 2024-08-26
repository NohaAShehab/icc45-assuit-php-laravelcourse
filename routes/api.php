<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

# any route in this file have the prefix api in url

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("/test", function (){
    return "test";
});

use App\Http\Controllers\Api\StudentController;

Route::apiResource("/student", StudentController::class);


