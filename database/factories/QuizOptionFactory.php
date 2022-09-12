<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuizOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'quiz_id' => 15,
            'option' => $this->faker->word,
            'correct_ans' => rand(1,4)
        ];
    }
}
