<?php

namespace App\Helpers;

class Instagram implements Social
{
    public function share($url, $title): string
    {
        return "$url-$title";
    }
}
