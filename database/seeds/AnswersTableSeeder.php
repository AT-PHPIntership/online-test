<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Answer;
use App\Models\Question;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
              $question_id = Question::all()->pluck('id');
              for ($i = 1; $i <= 30; $i++) {
                factory(App\Models\Answer::class)->create([
                    'question_id' => $faker->randomElement($question_id->toArray())
                  ]);
              }
    }
}
