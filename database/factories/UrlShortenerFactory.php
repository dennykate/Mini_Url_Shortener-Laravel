<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UrlShortener>
 */
class UrlShortenerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "fullUrl"=> $this->faker->url(),
            "shortUrl"=> substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, 10),
            "clicks"=> 0
        ];
    }
}
