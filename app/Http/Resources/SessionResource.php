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
                'message' => trans('reason_codes.'. $lastTransaction->response_code),
                'date' => $this->created_at->format('c')
            ],
            'uuid' => $this->uuid,
            'payer' => [
                'name' => $lastTransaction->payer->name,
                'surname' => $lastTransaction->payer->surname,
                'documentType' => $lastTransaction->payer->document_type,
                'document' => $lastTransaction->payer->document_number,
                'email' => $lastTransaction->payer->email,
                'mobile' => $lastTransaction->payer->mobile,
            ],
            'buyer' => [
                'name' => $this->buyer->name,
                'surname' => $this->buyer->surname,
                'documentType' => $this->buyer->document_type,
                'document' => $this->buyer->document_number,
                'email' => $this->buyer->email,
                'mobile' => $this->buyer->mobile,
            ],
            'payment' => [
                'status' => [
                    'status' => $lastTransaction->status,
                    'reason' => $lastTransaction->response_code,
                    'message' => trans('reason_codes.'. $lastTransaction->response_code),
                    'date' => $lastTransaction->created_at->format('c')
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
