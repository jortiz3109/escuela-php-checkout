<?php

namespace Database\Factories;

use App\Models\PaymentMethod;
use App\Models\Person;
use App\Models\Session;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'payer_id' => Person::factory(),
            'session_id' => Session::factory(),
            'status' => Transaction::STATUS_PENDING,
            'response_code' => '?-',
            'payment_method_id' => PaymentMethod::firstOrCreate([
                'name' => 'VISA DEBIT',
            ]),
            'pan' => $this->faker->creditCardNumber(),
            'receipt' => $this->faker->numberBetween(100000, 999999),
            'authorization' => $this->faker->numberBetween(100000, 999999),
            'date' => $this->faker->dateTime(),
        ];
    }
}
