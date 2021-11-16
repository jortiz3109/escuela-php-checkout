<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Crypt;

class SessionResource extends JsonResource
{
    public static $wrap = 'session';

    public function toArray($request)
    {
        $lastTransaction = $this->transactions->last();

        return [
            'status' => [
                'status' => $this->status,
                'reason' => $lastTransaction->response_code,
                'message' => trans('reason_codes.' . $lastTransaction->response_code),
                'date' => $this->created_at->format('c'),
            ],
            'uuid' => $this->uuid,
            'payer' => $lastTransaction->payer->toArray(),
            'buyer' => $this->buyer->toArray(),
            'payment' => [
                'status' => [
                    'status' => $lastTransaction->status,
                    'reason' => $lastTransaction->response_code,
                    'message' => trans('reason_codes.' . $lastTransaction->response_code),
                    'date' => $lastTransaction->created_at->format('c'),
                ],
                'reference' => $this->reference,
                'description' => $this->description,
                'amount' => [
                    'currency' => $this->currency->alphabetic_code,
                    'total' => $this->total_amount,
                ],
                'paymentMethod' => $lastTransaction->instrument->paymentMethod->name,
                'card' => substr_replace(Crypt::decryptString($lastTransaction->instrument->pan), '******', 6, -4),
                'receipt' => $lastTransaction->receipt,
                'authorization' => $lastTransaction->authorization,
            ],
            'ipAddress' => $this->ip_address,
            'userAgent' => $this->user_agent,
        ];
    }
}
