<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OrangeMoneyService
{
    protected $apiUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = env('ORANGE_MONEY_API_URL');
        $this->apiKey = env('ORANGE_MONEY_API_KEY');
    }

    public function pay($phone, $amount)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ])->post($this->apiUrl . '/payment', [
            'amount' => $amount,
            'currency' => 'XOF',
            'phone_number' => $phone,
            'transaction_id' => uniqid(),
            'callback_url' => route('orange.callback'),
        ]);

        return $response->json();
    }
}
