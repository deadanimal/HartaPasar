<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {

    Route::get('trader/{id}', [TradeController::class, 'api_view_trader_relationship']);
    Route::get('trader/{id}/offer', [TradeController::class, 'api_view_trader_offers']);

    Route::post('offer', [TradeController::class, 'api_create_peer_offer']);
    Route::put('offer/{id}', [TradeController::class, 'api_modify_peer_offer']);
    Route::post('offer/{id}/response', [TradeController::class, 'api_submit_response']);

    Route::get('offer', [TradeController::class, 'api_get_all_self_offers']);
    Route::get('response', [TradeController::class, 'api_get_all_self_responses']);

});


