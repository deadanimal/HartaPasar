<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\WebController;

use Illuminate\Support\Facades\Route;


Route::get('', [WebController::class, 'home']);

Route::middleware('auth')->group(function () {

    Route::get('dashboard', [WebController::class, 'dashboard']);

    Route::post('offer', [TradeController::class, 'create_offer']);
    Route::get('offer', [TradeController::class, 'view_offers']);
    Route::get('offer/{id}', [TradeController::class, 'view_offer']);
    
    Route::post('offer/{id}/cash', [TradeController::class, 'submit_offer']);
    Route::post('offer/{id}/credit', [TradeController::class, 'submit_credit_offer']);
    Route::put('offer/{id}/accept', [TradeController::class, 'accept_offer']);
    Route::put('offer/{id}/complete', [TradeController::class, 'complete_offer']);
    Route::post('offer/{id}/query', [TradeController::class, 'query_offer']);
    Route::post('offer/{offer_id}/query/{query_id}', [TradeController::class, 'respond_to_query']);

    Route::get('trader/{name}', [WebController::class, 'view_trader']);
});

Route::middleware('role:admin')->prefix('admin')->group(function () {

    Route::get('', [AdminController::class, 'dashboard']);

    Route::post('offer', [TradeController::class, 'create_offer']);
    Route::get('offer', [TradeController::class, 'view_offers']);
    Route::get('offer/{id}', [TradeController::class, 'view_offer']);
    
    Route::post('offer/{id}/submission', [TradeController::class, 'submit_offer']);
    Route::post('offer/{id}/accept', [TradeController::class, 'accept_offer']);
    Route::post('offer/{id}/complete', [TradeController::class, 'complete_offer']);
    Route::post('offer/{id}/query', [TradeController::class, 'query_offer']);
    Route::post('offer/{offer_id}/query/{query_id}', [TradeController::class, 'respond_to_query']);


});

require __DIR__.'/auth.php';
