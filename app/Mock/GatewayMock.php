<?php

namespace App\Mock;

use App\Constants\ReasonCodes;
use App\Contracts\GatewayContract;
use App\Helpers\StatusHelper;
use App\Models\Transaction;
use Throwable;

class GatewayMock implements GatewayContract
{
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
                'message' => StatusHelper::getTransactionMessage($reasonCode),
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
            'message' => StatusHelper::getTransactionMessage(ReasonCodes::INVALID_RESPONSE),
            'date' => now()->format('c'),
        ];
    }
}
