<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'con_fullName'=>$this->faker->name(),
            'con_email'=>$this->faker->safeEmail(),
            'con_areaCode'=>$this->faker->randomNumber(4, false),
            'con_phone'=>$this->faker->randomNumber(8, true),
            'con_message'=>$this->faker->text(100)
        ];
    }
}
