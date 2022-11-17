<?php

namespace App\UseCases;

use App\Repositories\EmployeeRepository;

class DeleteEmployeeUseCase
{
    private EmployeeRepository $repository;

    public function __construct()
    {
        $this->repository = (new EmployeeRepository());
    }

    public function execute(int $id): void
    {
        $this->repository::delete($id);
    }
}
