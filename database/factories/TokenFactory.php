<?php

namespace Database\Factories;

use App\Models\Merchant;
use App\Models\Token;
use Illuminate\Database\Eloquent\Factories\Factory;

class TokenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Token::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'token' => $this->faker->sha256(),
            'merchant_id' => Merchant::factory(),
            'expiration' => now()->addDay(),
            'active' => true,
        ];
    }
}
