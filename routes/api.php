<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;
use App\Http\Controllers\Api\PlatformController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ObjetController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\PersonnePhysiqueController;
use App\Http\Controllers\Api\AssociationController;
use App\Http\Controllers\Api\SocieteController;
use App\Http\Controllers\Api\PaymentOrderController;
use App\Http\Controllers\Api\PaymentController;



Route::apiResource('platforms', PlatformController::class);
Route::apiResource('services', ServiceController::class);
Route::apiResource('objets', ObjetController::class);
Route::apiResource('articles', ArticleController::class);
Route::apiResource('personne-physiques', PersonnePhysiqueController::class);
Route::apiResource('associations', AssociationController::class);
Route::apiResource('societes', SocieteController::class);


Route::get('/payment-orders', [PaymentOrderController::class, 'index']);
Route::post('/payment-orders', [PaymentOrderController::class, 'store']);
Route::get('/payment-orders/{paymentOrder}', [PaymentOrderController::class, 'show']);
Route::post('/payment-orders/{paymentOrder}/pay', [PaymentOrderController::class, 'pay']);
Route::post('/payment-orders/{paymentOrder}/cancel', [PaymentOrderController::class, 'cancel']);



Route::get('/payments', [PaymentController::class, 'index']);
Route::get('/payments/{payment}', [PaymentController::class, 'show']);


Route::get('/test/platform', [TestController::class, 'testCreatePlatform']);
Route::get('/test/chain', [TestController::class, 'testCreateChain']);
Route::get('/test/full-flow', [TestController::class, 'testFullFlow']);
Route::get('/test/cancel/{paymentOrder}', [TestController::class, 'testCancel']);