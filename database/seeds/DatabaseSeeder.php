<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PartsTableSeeder::class);
        $this->call(AdminUserTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ExamsTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(QuestionImageTableSeeder::class);
        $this->call(AnswersTableSeeder::class);
        
    }
}
