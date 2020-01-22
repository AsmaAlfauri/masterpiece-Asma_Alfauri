<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Illuminate\Http\File;

use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {

    $image = $faker->image();
    $imageFile = new File($image);

    return [
        'title' => $faker->title,
        'body' => $faker->text,
        'country' => $faker->address,
        'image'=> Storage::disk('public')->putFile('uploads/blogs', $imageFile),
        // 'favorite' => $faker->boolean,
    ];
});
