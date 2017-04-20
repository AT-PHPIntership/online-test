<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class PartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parts')->insert([
            [
            'title' => 'Part 1',
            'description'   => 'Photographs',
            'number_answer' =>'4',
            'number_question'   => '10',
            'created_at'    => Carbon::create()->toDateTimeString(),
            'updated_at'    => Carbon::create()->toDateTimeString(),
            ],
            [
            'title' => 'Part 2',
            'description'   => 'Question-Response',
            'number_answer' =>'3',
            'number_question'   => '30',
            'created_at'    => Carbon::create()->toDateTimeString(),
            'updated_at'    => Carbon::create()->toDateTimeString(),
            ],
            [
            'title' => 'Part 3',
            'description'   => 'Conversations',
            'number_answer' =>'4',
            'number_question'   => '30',
            'created_at'    => Carbon::create()->toDateTimeString(),
            'updated_at'    => Carbon::create()->toDateTimeString(),
            ],
            [
            'title' => 'Part 4',
            'description'   => 'Talks',
            'number_answer' =>'4',
            'number_question'   => '30',
            'created_at'    => Carbon::create()->toDateTimeString(),
            'updated_at'    => Carbon::create()->toDateTimeString(),
            ],
            [
            'title' => 'Part 5',
            'description'   => 'Incomplete sentences',
            'number_answer' =>'4',
            'number_question'   => '40',
            'created_at'    => Carbon::create()->toDateTimeString(),
            'updated_at'    => Carbon::create()->toDateTimeString(),
            ],
            [
            'title' => 'Part 6',
            'description'   => 'Text Completion',
            'number_answer' =>'4',
            'number_question'   => '12',
            'created_at'    => Carbon::create()->toDateTimeString(),
            'updated_at'    => Carbon::create()->toDateTimeString(),
            ],
            [
            'title' => 'Part 7',
            'description'   => 'Single Passages and Double Passages',
            'number_answer' =>'4',
            'number_question'   => '48',
            'created_at'    => Carbon::create()->toDateTimeString(),
            'updated_at'    => Carbon::create()->toDateTimeString(),
            ]
        ]);
    }
}
