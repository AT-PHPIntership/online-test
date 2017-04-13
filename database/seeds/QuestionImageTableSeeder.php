<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\QuestionImage;
use App\Models\Question;

class QuestionImageTableSeeder extends Seeder
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
              for ($i = 1; $i <= 10; $i++) {
                factory(App\Models\QuestionImage::class)->create([
                    'question_id' => $faker->randomElement($question_id->toArray())
                  ]);
              }
    }
}
