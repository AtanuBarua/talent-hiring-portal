<?php

namespace Database\Seeders;

use App\Models\QuizOption;
use Illuminate\Database\Seeder;

class QuizOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        QuizOption::factory(4)->create();
    }
}
