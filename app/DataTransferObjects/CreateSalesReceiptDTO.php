<?php

namespace App\DataTransferObjects;

use Carbon\Carbon as Date;

class CreateSalesReceiptDTO
{
    private int $employeeId;
    private Date $date;
    private int $amount;

    public function getEmployeeId(): int
    {
        return $this->employeeId;
    }

    public function setEmployeeId(int $employeeId): self
    {
        $this->employeeId = $employeeId;
        return $this;
    }

    public function getDate(): Date
    {
        return $this->date;
    }

    public function setDate(Date $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;
        return $this;
    }
}
