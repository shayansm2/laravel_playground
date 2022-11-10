<?php

namespace App\Lib;

class Pager
{
    private int $currentPage;
    private int $rowsOnPage;

    public function __construct(int $rowsOnPage, int $currentPage = 1)
    {
        $this->currentPage = $currentPage;
        $this->rowsOnPage = $rowsOnPage;
    }

    public function getLimit(): int
    {
        return $this->rowsOnPage;
    }

    public function getOffset(): int
    {
        return ($this->currentPage - 1) * $this->rowsOnPage;
    }
}
