<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('Contacts', [App\Http\Controllers\ContactController::class, 'contacts']);
Route::get('DeleteContact/{id}', [App\Http\Controllers\ContactController::class, 'DeleteContact']);
Route::post('SaveConstact', [App\Http\Controllers\ContactController::class, 'SaveConstact']);
Route::post('updateContact/{id}', [App\Http\Controllers\ContactController::class, 'updateContact']);

