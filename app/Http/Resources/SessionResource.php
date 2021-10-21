<?php

namespace App\Http\Resources;

use App\Models\Transaction;
use Illuminate\Http\Resources\Json\JsonResource;

class SessionResource extends JsonResource
{
    public function toArray($request): array
    {
        $transaction = optional($this->transactions)->last();

        return [
            'requestId' => $this->uuid,
            'status' => [
                'status' => $this->status,
                'reason' => '00',
                'message' => 'Approved',
                'date' => $this->date,
            ],
            'payment' => [
                'status' => [
                    'status' => optional($transaction)->status ?? Transaction::STATUS_PENDING,
                    'reason' => optional($transaction)->response_code,
                    'message' => 'Pending',
                    'date' => $transaction->date ?? null,
                ],
                'amount' => [
                    'total' => $this->total_amount,
                    'currency' => $this->currency->alphabetic_code,
                ],
                'reference' => $this->reference,
                'receipt' => optional($transaction)->receipt,
                'authorization' => optional($transaction)->authorization,
            ],
        ];
    }
}
