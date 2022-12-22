<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait ScraperTrait
{
    private string $baseUrl = 'https://quera.ir';

    public function setBaseUrl($url): void
    {
        $this->baseUrl = $url;
    }

    public function getPage(): string
    {
        return Http::get($this->baseUrl . '/blog')->body();
    }

    public function getPageTitle($page): string|null
    {
        preg_match('/<title>([^>]*)<\/title>/si', $page, $match);

        return is_array($match) ? $match[1] : null;
    }

    public function getPostTitles($page): array
    {
        preg_match_all('/<h4>.*?<a.*?>(.*?)<\/a>.*?<\/h4>/si', $page, $matches);

        return is_array($matches) ? $matches[1] : [];
    }
}
