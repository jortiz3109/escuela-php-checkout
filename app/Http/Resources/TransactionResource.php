<?php

namespace App\Http\Resources;

use App\Helpers\StatusHelper;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Crypt;

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
            'payer' => $this->payer->toArray(),
            'buyer' => $this->session->buyer->toArray(),
            'session' => $this->session->uuid,
            'reference' => $this->session->reference,
            'description' => $this->session->description,
            'amount' => [
                'currency' => $this->session->currency->alphabetic_code,
                'total' => $this->session->total_amount,
            ],
            'paymentMethod' => $this->instrument->paymentMethod->name,
            'card' => substr_replace(Crypt::decryptString($this->instrument->pan), '******', 6, -4),
            'receipt' => $this->receipt,
            'authorization' => $this->authorization,
        ];
    }
}
