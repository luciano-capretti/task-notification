<?php
declare(strict_types=1);

namespace Lightit\Backoffice\Employee\Domain\Actions;

use Lightit\Backoffice\Employee\Domain\DataTransferObjects\EmployeeDto;
use Lightit\Backoffice\Employee\Models\Employee;

class StoreEmployeeAction
{
    public function execute(EmployeeDto $employee_dto): Employee
    {
        $employee = Employee::create([
            'name' => $employee_dto->getName(),
            'email' => $employee_dto->getEmail(),
        ]);

        return $employee;
    }
}
