<?php

namespace App\Repositories;

use App\DataTransferObjects\CreateTimeCardDTO;
use App\Models\TimeCard;

class TimeCardRepository
{
    public static function create(CreateTimeCardDTO $dto): void
    {
        TimeCard::create([
            'employee_id' => $dto->getEmployeeId(),
            'date' => $dto->getDate(),
            'hours' => $dto->getHours(),
        ]);
    }
}
