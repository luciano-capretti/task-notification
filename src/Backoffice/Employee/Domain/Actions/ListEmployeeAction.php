<?php

namespace App\Backoffice\Employee\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Lightit\Backoffice\Employee\Models\Employee;

class ListEmployeeAction
{
    /**
     * @return Collection <int, Employee>
     */
    public function execute(): Collection
    {
        return Employee::all();
    }
}
