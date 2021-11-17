<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    protected $model = Person::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'document_type' => Person::DOCUMENT_TYPES[array_rand(Person::DOCUMENT_TYPES)],
            'document_number' => $this->faker->isbn10(),
            'email' => $this->faker->email(),
            'mobile' => $this->faker->e164PhoneNumber(),
        ];
    }
}
