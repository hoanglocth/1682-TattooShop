<?php

namespace Database\Factories;

use File;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class ArtistFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		$files = File::files(public_path('images/artist_seed'));
		$images = [];
		foreach ($files as $file) {
			$images[] = '/images/artist_seed'.'/'.$file->getRelativePathname();
		}
		return [
			'name' => $this->faker->name(),
			'img' => $this->faker->randomElement($images),
			'describes' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
		];
	}
}