<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            Product::create([
                'id' => $i,
                'title' => "Product $i",
                'price' => abs(pow(2, $i) - 500 * $i),
            ]);
        }
    }
}
