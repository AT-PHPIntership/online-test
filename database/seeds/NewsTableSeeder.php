<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Category;
use App\Models\AdminUser;
use App\Models\News;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
              $category_id = Category::all()->pluck('id');
              $admin_user_id = AdminUser::all()->pluck('id');
              for ($i = 1; $i <= 30; $i++) {
                factory(App\Models\News::class)->create([
                    'admin_user_id' => $faker->randomElement($admin_user_id->toArray()),
                    'category_id' => $faker->randomElement($category_id->toArray())
                  ]);
              }
    }
}
