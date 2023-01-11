<?php

use Faker\Generator as Faker;
use App\Models\Tattoo;
use App\Models\Category;
use App\Models\Artist;


$factory->define(Tattoo::class, function (Faker $faker) {
	$idCat = Category::pluck('id');
	$idArt = Artist::pluck('id');
	return[
		'name' => $faker->name(),
		'img' => '/images/default.jpg',
		'published_year' => $faker->year($max = 'now'),
		'describes' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
		'price' => $faker->numberBetween($min = 1000, $max = 1000000),
		'artist_id' => $faker->randomElement($idArt),
		'category_id' => $faker->randomElement($idCat),
	];
});