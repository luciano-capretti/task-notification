<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employee\App\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Lightit\Backoffice\Employee\Models\Employee;

class EmployeeTransformer extends Transformer
{
    /**
     * Transform the model data into a generic array.
     * @return array{id: int, name: string, email: string}
     */
    public function transform(Employee $employee): array
    {
        return [
            'id' => $employee->id,
            'name' => $employee->name,
            'email' => $employee->email,
        ];
    }
}
