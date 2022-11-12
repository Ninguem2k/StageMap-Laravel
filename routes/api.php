<?php

use App\Http\Controllers\Api\OrderedController;
use App\Http\Controllers\Api\OrderedImageController;
use App\Models\Ordered_Image;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::name('ordered.')->group(function () {
        Route::resource('ordered', OrderedController::class);
    });

    Route::name('users.')->group(function () {
        Route::resource('users', UserController::class);
    });

    Route::name('Stage.')->group(function () {
        Route::get('Stage/{id}/ordered', [CategoryController::class, 'ordered']);
        Route::resource('Stage', CategoryController::class);
    });

    Route::name('image.')->prefix('image')->group(function () {
        Route::delete('/{id}', [OrderedImageController::class, 'remove'])->name("delete");
        Route::get('/{id}/ordered', [OrderedImageController::class, 'removeAll'])->name("removeAll");
    });
});
