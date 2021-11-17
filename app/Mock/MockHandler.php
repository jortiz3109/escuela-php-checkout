<?php

namespace App\Mock;

use App\Constants\ReasonCodes;
use App\Helpers\StatusHelper;
use App\Models\Transaction;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class MockHandler
{
    public function __invoke(RequestInterface $request, array $options): PromiseInterface
    {
        return new FulfilledPromise($this->createResponse($request, $options));
    }

    private function createResponse(RequestInterface $request, array $options): ResponseInterface
    {
        $data = json_decode($request->getBody()->getContents(), true);
        return new Response(200, [], json_encode($this->process($data)));
    }

    public function process(array $data): array
    {
        $status = $this->getStatus($data);

        return [
            'status' => $status,
            'payer' => $data['payer'] ?? null,
            'buyer' => $data['buyer'] ?? null,
            'payment' => $data['payment'] ?? null,
            'instrument' => $data['instrument'] ?? null,
            'receipt' => random_int(111111, 99999999),
            'authorization' => $status['status'] === Transaction::STATUS_APPROVED ? random_int(111111, 99999999) : null,
        ];
    }

    private function getStatus(array $data)
    {
        try {
            $card = $data['instrument']['card'];
            $card['amount'] = $data['payment']['amount']['total'];
            $card['currency'] = $data['payment']['amount']['currency'];

            $reasonCode = $this->getCardReasonCode($card);

            return [
                'status' => StatusHelper::getTransactionStatus($reasonCode),
                'reason' => $reasonCode,
                'message' => StatusHelper::getReasonCodeMessage($reasonCode),
                'date' => now()->format('c'),
            ];
        } catch (Throwable $exception) {
            return $this->getFailedStatus();
        }
    }

    private function getCardReasonCode($card): string
    {
        $testingCard = new TestingCard($card['number'], config('mock.cards.' . $card['number']));

        return $testingCard->validate($card);
    }

    private function getFailedStatus(): array
    {
        return [
            'status' => Transaction::STATUS_FAILED,
            'reason' => ReasonCodes::INVALID_RESPONSE,
            'message' => StatusHelper::getReasonCodeMessage(ReasonCodes::INVALID_RESPONSE),
            'date' => now()->format('c'),
        ];
    }
}
