<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    protected $model = Card::class;

    public function definition(): array
    {
        return [
            'pan' => $this->faker->creditCardNumber,
            'payment_method_id' => PaymentMethod::firstOrCreate([
                'name' => 'VISA DEBIT',
            ]),
        ];
    }
}
