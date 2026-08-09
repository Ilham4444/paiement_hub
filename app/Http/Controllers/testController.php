<?php

namespace App\Http\Controllers;

use App\Actions\Article\CreateArticle;
use App\Actions\Association\CreateAssociation;
use App\Actions\Objet\CreateObjet;
use App\Actions\PaymentOrder\CancelPaymentOrder;
use App\Actions\PaymentOrder\CreatePaymentOrder;
use App\Actions\PaymentOrder\PayPaymentOrder;
use App\Actions\Platform\CreatePlatform;
use App\Actions\Service\CreateService;
use App\Models\Association;
use App\Models\PaymentOrder;
use App\Models\User;
use Illuminate\Support\Str;  


class TestController extends Controller
{
    
    public function testCreatePlatform()
    {
        $platform = (new CreatePlatform())->handle([
            'name' => 'Momotalakt',
            'base_url' => 'https://momotalakt.ma',
            'description' => 'Plateforme de gestion municipale',
            
        ]);

        return response()->json([
            'message' => 'Platform creee',
            'platform' => $platform,
        ]);
    }

   

    public function testFullFlow()
    {
        $user = User::first() ?? User::factory()->create();
        auth()->login($user);

      
        $platform = (new CreatePlatform())->handle([
            'name' => 'Rokhass',
            'base_url' => 'https://rokhass.ma',
            'description' => 'Plateforme de gestion municipale',
        ]);

        $service = (new CreateService())->handle([
            'name' => 'Autorisations commerciales',
            'platform_id' => $platform->id,
            'description' => 'Service de gestion des autorisations commerciales',
        ]);

        $objet = (new CreateObjet())->handle([
            'name' => 'Licence commerce',
            'service_id' => $service->id,
        ]);

        $article = (new CreateArticle())->handle([
            'name' => 'Licence annuelle',
            'description' => 'Autorisation d\'exercice commercial',
            'tax' => 50,
            'objet_id' => $objet->id,
        ]);


        $association = (new CreateAssociation())->handle([
            'name' => 'Association Test Agadir',
            'date_depot' => '2026-07-27',
        ]);

       
        $paymentOrder = (new CreatePaymentOrder())->handle([
            'reference' => 'PO-' . uniqid(),
            'title' => 'Licence commerciale 2026',
            'montant' => 1500,
            'article_id' => $article->id,
            'platform_id' => $platform->id,
            'external_id' => 'EXT-' . uniqid(),
            'beneficiary_id' => $association->id,
            'beneficiary_type' => Association::class,
        ]);

        $payment1 = (new PayPaymentOrder())->handle($paymentOrder, [
            'montant' => 1000,
            'transaction_number' => 'TX-001',
            'transaction_reference' => 'REF-001',
            'justification' => 'Acompte 1',
        ]);

        $payment2 = (new PayPaymentOrder())->handle($paymentOrder->fresh(), [
            'montant' => 500,
            'transaction_number' => 'TX-002',
            'transaction_reference' => 'REF-002',
            'justification' => 'Solde',
        ]);

        return response()->json([
            'message' => 'Cycle complet teste avec succes',
            'payment_order_final' => $paymentOrder->fresh()->load('payments'),
            'payment_1' => $payment1,
            'payment_2' => $payment2,
        ]);
    }

    
    public function testCancel(PaymentOrder $paymentOrder)
    {
        (new CancelPaymentOrder())->handle($paymentOrder);

        return response()->json([
            'message' => "PaymentOrder {$paymentOrder->id} annule (supprime).",
        ]);
    }
}