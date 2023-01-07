<?php

namespace App\Helpers;

class SocialFacade
{
    private array $socials = [];

    public function setSocials(... $socials): self
    {
        $this->socials = $socials;
        return $this;
    }

    public function share($url, $title): void
    {
        foreach ($this->socials as $social) {
            /** @var Social $social */
            $social->share($url, $title);
        }
    }
}
