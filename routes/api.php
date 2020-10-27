<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/get/records' , [App\Http\Controllers\EmployeeAPIController::class, 'getRecords']);
Route::get('/get/recordByID/{id}' , [App\Http\Controllers\EmployeeAPIController::class, 'getRecordByID']);
Route::get('/get/recordByFirstName/{name}' , [App\Http\Controllers\EmployeeAPIController::class, 'getRecordByFirstName']);
Route::get('/get/recordByPhone/{phone}' , [App\Http\Controllers\EmployeeAPIController::class, 'getRecordByPhone']);
Route::post('/input/record' , [App\Http\Controllers\EmployeeAPIController::class, 'inputRecord']);
Route::put('/update/record/{id}' , [App\Http\Controllers\EmployeeAPIController::class, 'updateRecord']);
Route::delete('/delete/record/{id}' , [App\Http\Controllers\EmployeeAPIController::class, 'deleteRecord']);