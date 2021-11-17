<?php

namespace App\Http\Resources;

use App\Helpers\CategoriesHelper;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PaymentMethodCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => PaymentMethodResource::collection($this->collection),
            'meta' => [
                'payment_methods_count' => $this->collection->count(),
                'categories' => CategoriesHelper::obtain(PaymentMethodResource::collection($this->collection)),
            ],
        ];
    }
}
