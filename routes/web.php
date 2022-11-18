<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\WebController;

use Illuminate\Support\Facades\Route;


Route::get('', [WebController::class, 'home']);

Route::middleware('auth')->group(function () {

    Route::get('dashboard', [WebController::class, 'dashboard']);

    Route::get('asset', [WebController::class, 'view_assets']);
    Route::get('asset/{id}', [WebController::class, 'view_asset']);    

    Route::post('offer', [TradeController::class, 'create_offer']);
    Route::get('offer', [TradeController::class, 'view_offers']);
    Route::get('offer/{id}', [TradeController::class, 'view_offer']);
    
    Route::post('offer/{id}/cash', [TradeController::class, 'submit_offer']);
    Route::put('offer/{id}/accept', [TradeController::class, 'accept_offer']);
    Route::put('offer/{id}/complete', [TradeController::class, 'complete_offer']);
    Route::post('offer/{id}/query', [TradeController::class, 'query_offer']);
    Route::post('offer/{offer_id}/query/{query_id}', [TradeController::class, 'respond_to_query']);

    Route::get('trader', [WebController::class, 'view_traders']);
    Route::get('trader/{name}', [WebController::class, 'view_trader']);

    Route::get('peer-offer/{id}', [TradeController::class, 'view_peer_offer']);
    Route::post('peer-offer}', [TradeController::class, 'create_peer_offer']);
    Route::post('peer-offer/{id}', [TradeController::class, 'respond_to_peer_offer']);
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
