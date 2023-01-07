<?php

namespace Tests\Feature;

use App\Helpers\Instagram;
use App\Helpers\SocialFacade;
use App\Helpers\Twitter;
use Tests\TestCase;

class FacadeSampleTest extends TestCase
{
    public function testFacadeHelper()
    {
        $twitter = new Twitter();
        $instagram   = new Instagram();

        $class = new SocialFacade();
        $class->setSocials($twitter, $instagram);

        $this->assertTrue(True, "ساخت شئ از کلاس با مشکل مواجه شد");
    }
}
