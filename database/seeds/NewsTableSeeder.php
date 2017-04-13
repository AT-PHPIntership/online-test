<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Category;
use App\Model\AdminUser;
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
              $category_id = factory(App\Models\Category::class, 10)->create()->pluck('id');
              $admin_user_id = factory(App\Models\AdminUser::class, 10)->create()->pluck('id');
              for ($i = 1; $i <= 30; $i++) {
                factory(App\Models\News::class)->create([
                    'admin_user_id' => $faker->randomElement($admin_user_id->toArray()),
                    'category_id' => $faker->randomElement($category_id->toArray())
                  ]);
              }
    }
}
