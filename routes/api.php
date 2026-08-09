<?php

use Illuminate\Support\Facades\Route;
use App\Actions\PaymentOrder\CreatePaymentOrder;
use App\Actions\PaymentOrder\ListPaymentOrders;
use App\Actions\PaymentOrder\ShowPaymentOrder;
use App\Actions\PaymentOrder\PayPaymentOrder;
use App\Actions\PaymentOrder\CancelPaymentOrder;
use App\Actions\Payment\ListPayments;
use App\Actions\Payment\ShowPayment;
use App\Actions\Platform\CreatePlatform;
use App\Actions\Platform\ListPlatforms;
use App\Actions\Platform\ShowPlatform;
use App\Actions\Platform\UpdatePlatform;
use App\Actions\Platform\DeletePlatform;
use App\Actions\Service\CreateService;
use App\Actions\Service\ListServices;
use App\Actions\Service\ShowService;
use App\Actions\Service\UpdateService;
use App\Actions\Service\DeleteService;
use App\Actions\Objet\CreateObjet;
use App\Actions\Objet\ListObjets;
use App\Actions\Objet\ShowObjet;
use App\Actions\Objet\UpdateObjet;
use App\Actions\Objet\DeleteObjet;
use App\Actions\Article\CreateArticle;
use App\Actions\Article\ListArticles;
use App\Actions\Article\ShowArticle;
use App\Actions\Article\UpdateArticle;
use App\Actions\Article\DeleteArticle;
use App\Actions\PersonnePhysique\CreatePersonnePhysique;
use App\Actions\PersonnePhysique\ListPersonnePhysiques;
use App\Actions\PersonnePhysique\ShowPersonnePhysique;
use App\Actions\PersonnePhysique\UpdatePersonnePhysique;
use App\Actions\PersonnePhysique\DeletePersonnePhysique;
use App\Actions\Association\CreateAssociation;
use App\Actions\Association\ListAssociations;
use App\Actions\Association\ShowAssociation;
use App\Actions\Association\UpdateAssociation;
use App\Actions\Association\DeleteAssociation;
use App\Actions\Societe\CreateSociete;
use App\Actions\Societe\ListSocietes;
use App\Actions\Societe\ShowSociete;
use App\Actions\Societe\UpdateSociete;
use App\Actions\Societe\DeleteSociete;
use App\Http\Controllers\TestController;


Route::get('/platforms', ListPlatforms::class);
Route::post('/platforms', CreatePlatform::class);
Route::get('/platforms/{platform}', ShowPlatform::class);
Route::put('/platforms/{platform}', UpdatePlatform::class);
Route::delete('/platforms/{platform}', DeletePlatform::class);


Route::get('/services', ListServices::class);
Route::post('/services', CreateService::class);
Route::get('/services/{service}', ShowService::class);
Route::put('/services/{service}', UpdateService::class);
Route::delete('/services/{service}', DeleteService::class);


Route::get('/objets', ListObjets::class);
Route::post('/objets', CreateObjet::class);
Route::get('/objets/{objet}', ShowObjet::class);
Route::put('/objets/{objet}', UpdateObjet::class);
Route::delete('/objets/{objet}', DeleteObjet::class);


Route::get('/articles', ListArticles::class);
Route::post('/articles', CreateArticle::class);
Route::get('/articles/{article}', ShowArticle::class);
Route::put('/articles/{article}', UpdateArticle::class);
Route::delete('/articles/{article}', DeleteArticle::class);


Route::get('/payment-orders', ListPaymentOrders::class);
Route::post('/payment-orders', CreatePaymentOrder::class);
Route::get('/payment-orders/{paymentOrder}', ShowPaymentOrder::class);
Route::post('/payment-orders/{paymentOrder}/pay', PayPaymentOrder::class);
Route::post('/payment-orders/{paymentOrder}/cancel', CancelPaymentOrder::class);


Route::get('/payments', ListPayments::class);
Route::get('/payments/{payment}', ShowPayment::class);

Route::get('/personne-physiques', ListPersonnePhysiques::class);
Route::post('/personne-physiques', CreatePersonnePhysique::class);
Route::get('/personne-physiques/{personnePhysique}', ShowPersonnePhysique::class);
Route::put('/personne-physiques/{personnePhysique}', UpdatePersonnePhysique::class);
Route::delete('/personne-physiques/{personnePhysique}', DeletePersonnePhysique::class);

Route::get('/associations', ListAssociations::class);
Route::post('/associations', CreateAssociation::class);
Route::get('/associations/{association}', ShowAssociation::class);
Route::put('/associations/{association}', UpdateAssociation::class);
Route::delete('/associations/{association}', DeleteAssociation::class);

Route::get('/societes', ListSocietes::class);
Route::post('/societes', CreateSociete::class);
Route::get('/societes/{societe}', ShowSociete::class);
Route::put('/societes/{societe}', UpdateSociete::class);
Route::delete('/societes/{societe}', DeleteSociete::class);


Route::get('/test/platform', [TestController::class, 'testCreatePlatform']);
Route::get('/test/full-flow', [TestController::class, 'testFullFlow']);
Route::get('/test/cancel/{paymentOrder}', [TestController::class, 'testCancel']);
