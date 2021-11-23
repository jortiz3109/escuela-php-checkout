<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PaymentMethodCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => $this->collection->groupBy(function (PaymentMethodResource $paymentMethod) {
                return $paymentMethod->category;
            }),
            'meta' => [
                'payment_methods_count' => $this->collection->count(),
            ],
        ];
    }
}
