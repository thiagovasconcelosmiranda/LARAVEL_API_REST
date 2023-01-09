<?php

use App\Http\Controllers\Api\AddressClientController;
use App\Http\Controllers\Api\AddressCompaniesController;
use App\Http\Controllers\Api\AnnouncementsController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentaryController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\GeolocalizationController;
use App\Http\Controllers\Api\ScheduleController;
use App\Models\Api\Geolocalization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\ClientController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Auth\RegisterController;

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

//rotes de signs
Route::prefix('auth')->group( function(){

    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('refresh', [LoginController::class, 'refresh']);
    Route::post('logout', [LoginController::class, 'logout'])
    ->middleware('auth:sanctum');
});


Route::prefix('page')->group(function(){

    Route::apiResource('/client', ClientController::class)->middleware('auth:sanctum')
    ->only('index', 'show', 'update', 'destroy', 'store');

    Route::apiResource('/addressclient', AddressClientController::class)->middleware('auth:sanctum')
    ->only('index', 'show', 'update', 'destroy', 'store');

    Route::apiResource('/commentary', CommentaryController::class)
    ->only('index', 'show', 'update', 'destroy', 'store');

    Route::apiResource('/company', CompanyController::class)->middleware('auth:sanctum')
    ->only('index', 'show', 'update', 'destroy', 'store');

    Route::apiResource('/addresscompany', AddressCompaniesController::class)->middleware('auth:sanctum')
    ->only('index', 'show', 'update', 'destroy', 'store');

    Route::apiResource('/announcement', AnnouncementsController::class)
    ->only('index', 'show', 'update', 'destroy', 'store');

    Route::apiResource('/category', CategoryController::class)
    ->only('index', 'show', 'update', 'destroy', 'store');

    Route::apiResource('/gallery', GalleryController::class)
    ->only('index', 'show', 'update', 'destroy', 'store');

    Route::apiResource('/favorite', FavoriteController::class)
    ->middleware('auth:sanctum')
    ->only('index', 'show', 'update', 'destroy', 'store');

    Route::apiResource('/schedule', ScheduleController::class)
    ->middleware('auth:sanctum')
    ->only('index', 'show', 'update', 'destroy', 'store');

    Route::apiResource('/geolocalization', GeolocalizationController::class)
    ->middleware('auth:sanctum')
    ->only('index', 'show', 'update', 'destroy', 'store');

    //Route::get('/contact', [ContactController::class, 'index']);
    Route::post('/contact', [ContactController::class, 'create']);
});








