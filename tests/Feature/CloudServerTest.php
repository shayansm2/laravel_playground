<?php

namespace Feature;

use App\Models\CPU;
use App\Models\RAM;
use App\Models\SSD;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CloudServerTest extends TestCase
{
    use RefreshDatabase;

    public function test_cpu_get_name()
    {
        $cpu = CPU::create([
            'name' => 'Xeon E3-1285L v2',
            'frequency' => 3.2,
        ]);
        $this->assertEquals('Xeon E3-1285L v2', $cpu->name);
    }

    public function test_cpu_get_frequency()
    {
        $cpu = CPU::create([
            'name' => 'Xeon E3-1285L v2',
            'frequency' => 3.2,
        ]);
        $this->assertEquals(3.2, $cpu->frequency);
    }

    public function test_cpu_get_price()
    {
        foreach (range(1, 40, 0.5) as $frequency) {
            $cpu = CPU::create([
                'name' => 'Xeon E3-1285L v2',
                'frequency' => $frequency,
            ]);
            $this->assertEquals($frequency * 100, $cpu->price);
        }
    }

    public function test_ram_get_name()
    {
        $ram = RAM::create([
            'name' => 'Kingston HyperX Fury',
            'capacity' => 1,
        ]);
        $this->assertEquals('Kingston HyperX Fury', $ram->name);
    }

    public function test_ram_get_capacity()
    {
        $ram = RAM::create([
            'name' => 'Kingston HyperX Fury',
            'capacity' => 1,
        ]);
        $this->assertEquals(1, $ram->capacity);
    }

    public function test_ram_get_price()
    {
        foreach (range(1, 1000) as $capacity) {
            $ram = RAM::create([
                'name' => 'Kingston HyperX Fury',
                'capacity' => $capacity,
            ]);
            $this->assertEquals($capacity * 20, $ram->price);
        }
    }

    public function test_ssd_get_name()
    {
        $ssd = SSD::create([
            'name' => 'ADATA SU740',
            'capacity' => 1,
        ]);
        $this->assertEquals('ADATA SU740', $ssd->name);
    }

    public function test_ssd_get_capacity()
    {
        $ssd = SSD::create([
            'name' => 'ADATA SU740',
            'capacity' => 1,
        ]);
        $this->assertEquals(1, $ssd->capacity);
    }

    public function test_ssd_get_price()
    {
        foreach (range(1, 1000) as $capacity) {
            $ssd = SSD::create([
                'name' => 'ADATA SU740',
                'capacity' => $capacity,
            ]);
            $this->assertEquals($capacity * 15, $ssd->price);
        }
    }
}
