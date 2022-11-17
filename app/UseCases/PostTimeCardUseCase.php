<?php

namespace App\UseCases;

use App\DataTransferObjects\CreateTimeCardDTO;
use App\Repositories\EmployeeRepository;
use App\Repositories\TimeCardRepository;
use Carbon\Carbon;

class PostTimeCardUseCase
{
    private TimeCardRepository $timeCardRepository;
    private EmployeeRepository $employeeRepository;

    public function __construct()
    {
        $this->timeCardRepository = new TimeCardRepository();
        $this->employeeRepository = new EmployeeRepository();
    }

    public function execute(int $employeeId, string $date, int $hours): void
    {
        $this->employeeRepository->findOrFail($employeeId);

        $dto = (new CreateTimeCardDTO())
            ->setEmployeeId($employeeId)
            ->setDate(Carbon::parse($date))
            ->setHours($hours);

        $this->timeCardRepository::create($dto);
    }
}
