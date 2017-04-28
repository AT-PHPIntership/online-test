<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Question;
use App\Models\Part;
use App\Models\Exam;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
              $part_id = Part::all()->pluck('id');
              $exam_id = Exam::all()->pluck('id');
              for ($i = 1; $i <= 30; $i++) {
                factory(App\Models\Question::class)->create([
                    'exam_id' => $faker->randomElement($exam_id->toArray()),
                    'part_id' => $faker->randomElement($part_id->toArray())
                  ]);
              }
    }
}
