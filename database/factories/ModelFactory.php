<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456'),
        'name'  => $faker->firstName().' '.$faker->lastName(),
        'sex'       => $faker->NumberBetween($min = 0, $max = 1),
        'birthday'  => $faker->dateTimeBetween($startDate = '-25 years', $endDate = '-20 years'),
    ];
});

$factory->define(App\Models\AdminUser::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456'),
        'name'  => $faker->firstName().' '.$faker->lastName(),
        'sex'       => $faker->biasedNumberBetween($min = 0, $max = 1),
        'birthday'  => $faker->dateTimeBetween($startDate = '-25 years', $endDate = '-20 years'),
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->text($maxNbChars = 70),
    ];
});

$factory->define(App\Models\News::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text($maxNbChars = 70),
        'slug'  => $faker->slug,
        'content' => $faker->paragraph($nbSentences = 12, $variableNbSentences = true),
    ];
});

$factory->define(App\Models\Exam::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text($maxNbChars = 70),
        'audio'  => $faker->Url,
        'count_test' => $faker->biasedNumberBetween($min = 0, $max = 50),
    ];
});

$factory->define(App\Models\QuestionImage::class, function (Faker\Generator $faker) {
    return [
        'image' => $faker->imageUrl($width = 300, $height = 300),
    ];
});

$factory->define(App\Models\Question::class, function (Faker\Generator $faker) {
    return [
        'content' => $faker->text($minNbChars = 5 , $maxNbChars = 30),
    ];
});

$factory->define(App\Models\Answer::class, function (Faker\Generator $faker) {
    return [
        'content' => $faker->text($minNbChars = 5 , $maxNbChars = 30),
    ];
});