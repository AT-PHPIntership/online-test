<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Answer;

class PartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Part::class, 7)->create();
    }
}
