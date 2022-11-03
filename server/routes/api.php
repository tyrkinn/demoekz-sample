<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\TestController;
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

Route::get('/test', [TestController::class, 'index']);

Route::controller(ApplicationController::class)->prefix('applications')->group(function () {
  Route::get('/', 'getAll');
  Route::get('/solved', 'getLastFiveSolved');
  Route::get('/{id}', 'getById');
  Route::post('/', 'create');
});
