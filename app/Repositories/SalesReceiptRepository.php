<?php

namespace App\Repositories;

use App\DataTransferObjects\CreateSalesReceiptDTO;
use App\Models\SalesReceipt;

class SalesReceiptRepository
{
    public static function create(CreateSalesReceiptDTO $dto): void
    {
        SalesReceipt::create([
            'employee_id' => $dto->getEmployeeId(),
            'date' => $dto->getDate(),
            'amount' => $dto->getAmount(),
        ]);
    }
}
