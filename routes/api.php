<?php

use App\Http\Controllers\PayoutController;
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

Route::post('payouts', [PayoutController::class, 'store'])->middleware('auth.token');
Route::post('payouts/{id}/status', [PayoutController::class, 'changeStatus']);
