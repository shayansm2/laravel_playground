<?php

namespace Tests\Feature;

use App\Traits\ScraperTrait;
use Tests\TestCase;

class ScraperSampleTest extends TestCase
{
    use ScraperTrait;

    public function test_get_title()
    {
        $page = file_get_contents(__DIR__.'/sample_index.html');

        $this->assertEquals(
            'بلاگ کوئرا - همه چیز درباره دنیای برنامه نویسی',
            $this->getPageTitle($page)
        );
    }

    public function test_get_title_2()
    {
        $page = <<<EOF
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
                <title>Quera College</title>
            </head>
            <body>
            </body>
            </html>
            EOF;

        $this->assertEquals(
            'Quera College',
            $this->getPageTitle($page)
        );
    }

    public function test_get_post_titles()
    {
        $page = <<<EOF
            <h4> <a href="https://quera.ir/blog/reasons-why-you-should-learn-react/">چرا باید React را بیاموزید</a></h4>

            <h4> <a href="https://quera.ir/blog/unidro-mine-problem-results/">نتایج رسمی مسابقه ماین پرابلم یونیدرو</a></h4>
            EOF;

        $this->assertEquals(
            [
                'چرا باید React را بیاموزید',
                'نتایج رسمی مسابقه ماین پرابلم یونیدرو',
            ],
            $this->getPostTitles($page)
        );
    }
}
