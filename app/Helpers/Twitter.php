<?php

namespace App\Helpers;

class Twitter implements Social
{
    public function share($url, $title): string
    {
        return "$url-$title";
    }
}
