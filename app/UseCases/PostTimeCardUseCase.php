<?php

namespace App\UseCases;

use App\DataTransferObjects\CreateTimeCardDTO;
use App\Models\Employee;
use App\Repositories\TimeCardRepository;
use Carbon\Carbon;

class PostTimeCardUseCase
{
    private TimeCardRepository $repository;

    public function __construct()
    {
        $this->repository = new TimeCardRepository();
    }

    public function execute(int $employeeId, string $date, int $hours): void
    {
        Employee::findOrFail($employeeId);

        $dto = (new CreateTimeCardDTO())
            ->setEmployeeId($employeeId)
            ->setDate(Carbon::parse($date))
            ->setHours($hours);

        $this->repository::create($dto);
    }
}
