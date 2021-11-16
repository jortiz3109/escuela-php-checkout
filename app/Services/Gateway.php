<?php

namespace App\Services;

use App\Constants\ReasonCodes;
use App\Contracts\GatewayContract;
use App\Models\Session;
use App\Models\Transaction;
use GuzzleHttp\ClientInterface;
use Illuminate\Support\Facades\Crypt;

class Gateway implements GatewayContract
{
    private ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function process(Transaction $transaction): Transaction
    {
        $response = $this->client->request('post', config('core.urls.process'), [
            'json' => [
                'date' => $transaction->created_at->format('c'),
                'payer' => [
                    'name' => $transaction->payer->name,
                    'surname' => $transaction->payer->surname,
                    'documentType' => $transaction->payer->document_type,
                    'document' => $transaction->payer->document_number,
                    'email' => $transaction->payer->email,
                    'mobile' => $transaction->payer->mobile,
                ],
                'payment' => [
                    'reference' => $transaction->session->reference,
                    'description' => $transaction->session->description,
                    'amount' => [
                        'currency' => $transaction->session->currency,
                        'total' =>  $transaction->session->total_amount,
                    ],
                ],
                'instrument' => [
                    'card' => [
                        'number' => Crypt::decryptString($transaction->instrument->pan),
                        'cvv' => $transaction->instrument->cvv(),
                        'expiration' => $transaction->instrument->expiration(),
                        'pin' => $transaction->instrument->pin(),
                    ],
                ],
            ],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        $transaction->status = $data['status']['status'] ?? Transaction::STATUS_FAILED;
        $transaction->response_code = $data['status']['reason'] ?? ReasonCodes::INVALID_RESPONSE;
        $transaction->receipt = $data['receipt'] ?? null;
        $transaction->authorization = $data['authorization'] ?? null;

        $transaction->save();

        if ($transaction->status == Transaction::STATUS_APPROVED) {
            $session = $transaction->session;
            $session->status = Session::STATUS_APPROVED;

            $session->save();
        }

        return $transaction;
    }
}
