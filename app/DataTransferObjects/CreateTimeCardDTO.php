<?php

namespace App\DataTransferObjects;

use Carbon\Carbon as Date;

class CreateTimeCardDTO
{
    private int $employeeId;
    private Date $date;
    private int $hours;

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

    public function getHours(): int
    {
        return $this->hours;
    }

    public function setHours(int $hours): self
    {
        $this->hours = $hours;
        return $this;
    }
}
