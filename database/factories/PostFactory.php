<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = str_replace(".", "", $this->faker->text(20));
        $slug = str_replace(" ", "-", $title);
        $paragraphs = $this->faker->paragraphs(rand(2, 6));
        $body = "<h1> $title </h1>";
        foreach ($paragraphs as $paragraph) {
            $body .= "<p> $paragraph </p>";
        }

        return [
            'title' => $title,
            'slug' => $slug,
            'body' => $body
        ];
    }
}
