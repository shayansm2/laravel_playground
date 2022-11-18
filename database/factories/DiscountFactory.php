<?php

namespace Database\Factories;

use App\Models\Discount;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Discount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $filePath = rand(111111, 999999).'.pdf';
        touch(storage_path($filePath));
        return [
            'file_path' => $filePath,
            'user_id' => User::factory()->create()->id,
        ];
    }
}
