<?php

use App\Models\Artist;
use Faker\Generator as Faker;

$factory->define(Artist::class, function (Faker $faker) {
	return[
		'name' => $faker->name(),
		'img' => '/images/default.jpg',
		'published_year' => $faker->year($max = 'now'),
		'describes' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
	];
});
