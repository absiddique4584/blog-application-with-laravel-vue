<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('12345678'), // password
        'remember_token' => Str::random(10),
    ];
});




$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'cat_name' => $faker->name,
    ];
});



$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
        'cat_id' => rand(1,10),
        'user_id' => rand(1,10),
        'comment_id' => rand(1,10),
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'photo' => $faker->imageUrl(),
    ];
});
