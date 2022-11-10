<?php

namespace App\Lib;

use Assert\Assert;
use Illuminate\Database\Query\Builder;

class CustomQueryBuilder extends Builder
{
    private bool $hasLimit = false;

    public function withPager(Pager $pager)
    {
        $this->hasLimit = true;
        $this->skip($pager->getOffset());
        $this->take($pager->getLimit());
    }

    public function take($value): CustomQueryBuilder
    {
        $this->hasLimit = true;
        return parent::take($value);
    }

    public function limit($value): CustomQueryBuilder
    {
        $this->hasLimit = true;
        return parent::limit($value);
    }

    public function get($columns = ['*']): \Illuminate\Support\Collection
    {
        Assert::that($this->hasLimit)->true('please set the pager or limit before getting your result from db');
        return parent::get($columns);
    }

    public function value($column)
    {
        Assert::that($this->hasLimit)->true('please set the pager or limit before getting your result from db');
        return parent::value($column);
    }
}
