<?php

namespace Database\Factories;

use App\Models\Artist;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class TattooFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		$idCat = Category::pluck('id');
		$idArt = Artist::pluck('id');
		return [
			'name' => $this->faker->words($nb = 3, $asText = false),
			'img' => '/images/default.jpg',
			'describes' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
			'price' => $this->faker->numberBetween($min = 20, $max = 5000),
			'artist_id' => $this->faker->randomElement($idArt),
			'category_id' => $this->faker->randomElement($idCat),
		];
	}
}