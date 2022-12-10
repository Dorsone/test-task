<?php

use App\Http\Controllers\Api\v1\CurrencyController;
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

Route::get('/currencies/{currency}/rates', [CurrencyController::class, 'currencyRates'])->name('currencies.index');
