<?php

namespace App\Services;

use Omnipay\Omnipay;

class AuthorizeNetGateway
{
    protected $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('AuthorizeNet_AIM');

        $this->gateway->setApiLoginId(config('services.authorizenet.api_login_id'));
        $this->gateway->setTransactionKey(config('services.authorizenet.transaction_key'));

        // ✅ Forcer sandbox
        $this->gateway->setTestMode(config('services.authorizenet.sandbox', true));
        $this->gateway->setDeveloperMode(true);
    }

    public function charge(array $data)
    {
        return $this->gateway->purchase([
            'amount'   => $data['amount'],
            'currency' => $data['currency'] ?? 'USD',
            'card'     => [
                'number'      => $data['card_number'],
                'expiryMonth' => $data['expiry_month'],
                'expiryYear'  => $data['expiry_year'],
                'cvv'         => $data['cvv'],
            ],
        ])->send();
    }
}
