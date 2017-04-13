<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\AdminUser;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\AdminUser::class, 5)->create();
    }
}
