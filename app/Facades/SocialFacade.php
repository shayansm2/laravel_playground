<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class SocialFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'social';
    }
}
