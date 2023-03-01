<?php

namespace Database\Factories;

use App\Models\Artist;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

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
		$files = File::files(public_path('images/tattoo_seed'));
		$images = [];
		foreach ($files as $file) {
			$images[] = '/images/tattoo_seed'.'/'.$file->getRelativePathname();
		}
		$idCat = Category::pluck('id');
		$idArt = Artist::pluck('id');
		return [
			'name' => $this->faker->unique()->words(3, true),
			'img' => $this->faker->randomElement($images),
			// 'img' => $this->faker->imageUrl(360, 360, 'animals', true, 'cats'),
			'describes' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
			'price' => $this->faker->numberBetween($min = 20, $max = 5000),
			'artist_id' => $this->faker->randomElement($idArt),
			'category_id' => $this->faker->randomElement($idCat),
		];
	}
}