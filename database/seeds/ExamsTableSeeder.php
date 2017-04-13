<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Exam;

class ExamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Exam::class, 10)->create();
    }
}
