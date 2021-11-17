<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\Merchant;
use App\Models\Person;
use App\Models\Session;
use Illuminate\Database\Eloquent\Factories\Factory;

class SessionFactory extends Factory
{
    protected $model = Session::class;

    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'merchant_id' => Merchant::factory(),
            'buyer_id' => Person::factory(),
            'status' => Session::STATUS_PENDING,
            'reference' => $this->faker->bothify('######????'),
            'description' => $this->faker->sentence(),
            'currency_id' => Currency::firstOrCreate([
                'name' => 'US dollar',
                'minor_unit' => 2,
                'alphabetic_code' => 'USD',
                'numeric_code' => '840',
            ]),
            'total_amount' => $this->faker->numberBetween(1, 999999),
            'expiration' => $this->faker->dateTime(),
            'ip_address' => $this->faker->ipv6(),
            'user_agent' => $this->faker->userAgent(),
            'return_url' => $this->faker->url(),
        ];
    }
}
