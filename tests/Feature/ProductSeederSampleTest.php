<?php

namespace Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ProductSeederSampleTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
    }

    public function testProductSeeder()
    {
        Artisan::call('db:seed', ['--class'=> 'ProductSeeder']);
        $products = Product::all();
        for ($i = 1; $i <= 5; $i++) {
            $this->assertEquals($i, $products[$i - 1]->id);
            $this->assertEquals('Product '.$i, $products[$i - 1]->title);
            $this->assertEquals(abs((2 ** $i) - (500 * $i)), $products[$i - 1]->price);
        }
    }
}
