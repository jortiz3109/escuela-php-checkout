<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
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
