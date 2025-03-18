<?php

namespace App\Backoffice\Employee\Domain\Actions;

use Lightit\Backoffice\Employee\Models\Employee;

class StoreEmployeeAction
{
    public function execute(array $data): Employee
    {
        return Employee::create($data);
    }
}
