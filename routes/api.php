<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerReadingController;
use App\Http\Controllers\ReadingPeriodController;
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

// List all customers
Route::get('customers', [CustomerController::class, 'index']);

// List a single customer
Route::get('customers/{customer}', [CustomerController::class, 'show']);

// List a single customer using the erp_id
Route::get('customers/erp/{customer}', [CustomerController::class, 'showERPCustomer']);

// List all readings for all customers
Route::get('readings', [CustomerReadingController::class, 'index']);

// List all readings for a single customer
Route::get('readings/{customer}', [CustomerReadingController::class, 'getCustomerReadings']);

// List all readings for a single customer using the erp_id
Route::get('readings/erp/{customer}', [CustomerReadingController::class, 'getERPCustomerReadings']);

// List all periods
Route::get('periods', [ReadingPeriodController::class, 'index']);

// List a single reading for a single customer
Route::get('readings/{customer}/{period}', [CustomerReadingController::class, 'status']);

// List a single reading for a single customer using the erp_id and period e.g. january 2022
Route::get('readings/erp/{customer}/{period}', [CustomerReadingController::class, 'periodStatus']);

// List a single reading for a single customer using the erp_id, month and year e.g. january/2022
Route::get('readings/erp/{customer}/{month}/{year}', [CustomerReadingController::class, 'monthYearStatus']);
