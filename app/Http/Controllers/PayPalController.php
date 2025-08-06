<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    public function createOrder()
    {
        $provider = new PayPalClient();
//        dd($provider);
        $provider = new PayPalClient();

        $provider->setApiCredentials(config('paypal'));
//        dd($provider);
        $token = $provider->getAccessToken();

        $provider->setAccessToken($token);

        $order = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "amount" => [
                    "currency_code" => "USD",
                    "value" => "100.00"
                ]
            ]],
            "application_context" => [
                "cancel_url" => route('paypal.cancel'),
                "return_url" => route('paypal.success'),
            ],
        ]);

        // Rediriger vers PayPal pour le paiement
        if (isset($order['id']) && $order['id'] != null) {
            foreach ($order['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }

        return redirect()->route('paypal.cancel');
    }

    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->setAccessToken($provider->getAccessToken());

        $result = $provider->capturePaymentOrder($request->token);

        if (isset($result['status']) && $result['status'] == 'COMPLETED') {
            // Paiement réussi, traiter la commande ici

            return 'Paiement réussi !';
        }

        return 'Paiement échoué.';
    }

    public function cancel()
    {
        return 'Paiement annulé.';
    }
}
