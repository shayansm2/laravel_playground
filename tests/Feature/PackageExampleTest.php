<?php

namespace Tests\Feature;

use Tests\TestCase;

class PackageExampleTest extends TestCase
{
    public function test_access()
    {
        $response = $this->get('/health');

        $response->assertSee(['دیتابیس', 'مایگریشن ها', 'روت‌ها']);
    }
}
