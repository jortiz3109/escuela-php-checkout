<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Crypt;

class CardFactory extends Factory
{
    protected $model = Card::class;

    public function definition(): array
    {
        return [
            'pan' => Crypt::encryptString($this->faker->creditCardNumber),
            'payment_method_id' => PaymentMethod::firstOrCreate([
                'name' => 'VISA DEBIT',
            ]),
        ];
    }
}
