<?php

namespace App\Http\Resources;

use App\Helpers\StatusHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    public static $wrap = 'transaction';

    public function toArray($request)
    {
        return [
            'status' => [
                'status' => $this->status,
                'reason' => $this->response_code,
                'message' => StatusHelper::getReasonCodeMessage($this->response_code),
                'date' => $this->created_at->format('c'),
            ],
            'uuid' => $this->uuid,
            'payer' => $this->payer->toResponse(),
            'buyer' => $this->session->buyer->toResponse(),
            'session' => $this->session->uuid,
            'reference' => $this->session->reference,
            'description' => $this->session->description,
            'amount' => [
                'currency' => $this->session->currency->alphabetic_code,
                'total' => $this->session->total_amount,
            ],
            'paymentMethod' => $this->instrument->paymentMethod->name,
            'instrument' => $this->instrument->toResponse(),
            'receipt' => $this->receipt,
            'authorization' => $this->authorization,
        ];
    }
}
