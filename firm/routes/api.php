<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportTypeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CompanyController;

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*

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



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get(
        '/profile',
        function (Request $request) {
            return auth()->user();
        }
    );

    Route::resource('companies', CompanyController::class);
    Route::resource('reports', ReportController::class)->only(['update', 'store', 'destroy']);
   // Route::get('/reports', [ReportController::class, 'index']);
    Route::post('/report', [ReportController::class, 'store']);
    Route::get('/report/{id}', [ReportController::class, 'getById']);

    Route::get('/users', [UserController::class, 'index']); 
    Route::get('/companies', [CompanyController::class, 'index']);
    Route::put('/report/{id}', [ReportController::class, 'updateById']);
    Route::delete('/report/{id}', [ReportController::class, 'destroy']);
    Route::get('/reportbytype/{reporttype}', [ReportController::class, 'reportByType']);
    Route::get('/companyreports/{company}', [ReportController::class, 'reportByCompany']);


    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::get('/reports', [ReportController::class, 'index']);
