<?php

use App\Http\Controllers\API\v1\CustomerController;
use Illuminate\Http\Request;
use App\Http\Controllers\API\v1\InvoiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Student;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix' => 'v1', 'middleware' => 'auth:sanctum'], function() {
    Route::apiResource('customers', CustomerController::class);


    Route::post('invoices/bulk', ['uses' => 'InvoiceController@bulkStore']);

    Route::get('student',[StudentController::class, 'index']);
Route::post('student',[StudentController::class, 'store']);


Route::get('teacher',[TeacherController::class, 'index']);

Route::post('teacher',[TeacherController::class, 'store']);

});





// Route::get('/student', function () {
//     return 'welcome';
// });

//api/v1
// Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\API\v1'], function() {
//     Route::apiResource('customers', CustomerController::class);
//     Route::apiResource('invoices', InvoiceController::class);
//     Route::put('customers/{customer}', [CustomerController::class, 'update']);
// });
