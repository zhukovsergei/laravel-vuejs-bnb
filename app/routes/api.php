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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('bookables', \App\Http\Controllers\Api\BookableController::class)->only(['index', 'show']);
Route::get('bookables/{bookable}/availability', \App\Http\Controllers\Api\BookableAvailabilityController::class)
    ->name('bookables.availability.show');
Route::get('bookables/{bookable}/reviews', \App\Http\Controllers\Api\BookableReviewController::class)
    ->name('bookables.reviews.index');

Route::get('bookables/{bookable}/reviews', \App\Http\Controllers\Api\BookableReviewController::class)
    ->name('bookables.reviews.index');

Route::apiResource('reviews', \App\Http\Controllers\Api\ReviewController::class)->only(['show', 'store']);

Route::get('booking-by-review/{reviewKey}', \App\Http\Controllers\Api\BookingByReviewController::class)
    ->name('booking.by-review.show');
