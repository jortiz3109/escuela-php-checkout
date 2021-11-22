<?php

namespace App\Services;

use App\Constants\ReasonCodes;
use App\Contracts\GatewayContract;
use App\Models\Session;
use App\Models\Transaction;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

class Gateway implements GatewayContract
{
    private ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function process(Transaction $transaction): Transaction
    {
        $response = $this->request($transaction);

        $this->updateTransaction($response, $transaction);

        if ($transaction->status === Transaction::STATUS_APPROVED) {
            $this->updateSession($transaction);
        }

        return $transaction;
    }

    private function request(Transaction $transaction): ResponseInterface
    {
        return $this->client->request('post', config('core.urls.process'), [
            'json' => [
                'date' => $transaction->created_at->format('c'),
                'payer' => $transaction->payer->toArray(),
                'payment' => [
                    'reference' => $transaction->session->reference,
                    'description' => $transaction->session->description,
                    'amount' => [
                        'currency' => $transaction->session->currency,
                        'total' => $transaction->session->total_amount,
                    ],
                ],
                'instrument' => $transaction->instrument->toArray(),
            ],
        ]);
    }

    private function updateTransaction(ResponseInterface $response, Transaction $transaction): void
    {
        $data = json_decode($response->getBody()->getContents(), true);

        $transaction->update([
            'status' => $data['status']['status'] ?? Transaction::STATUS_FAILED,
            'response_code' => $data['status']['reason'] ?? ReasonCodes::INVALID_RESPONSE,
            'receipt' => $data['receipt'] ?? null,
            'authorization' => $data['authorization'] ?? null,
        ]);
    }

    private function updateSession(Transaction $transaction): void
    {
        $transaction->session->update([
            'status' => Session::STATUS_APPROVED,
        ]);
    }
}
