<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('/contacts', 'ContactController@index');
// Route::post('/contacts', 'ContactController@store');
// Route::get('/contacts/{id}', 'ContactController@show');
// Route::put('/contacts/{id}', 'ContactController@update');
// Route::delete('/contacts/{id}', 'ContactController@destroy');
Route::get('getcontact', [ApiController::class, 'getContact'])->name('getContact');
Route::get('getcontactbyid/{id}', [ApiController::class, 'getContactById'])->name('getContactById');