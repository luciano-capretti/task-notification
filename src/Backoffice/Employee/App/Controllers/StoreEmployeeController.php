<?php
declare(strict_types=1);

namespace Lightit\Backoffice\Employee\App\Controllers;

use Lightit\Backoffice\Employee\Domain\Actions\StoreEmployeeAction;
use Lightit\Backoffice\Employee\App\Request\StoreEmployeeRequest;
use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Employee\App\Transformers\EmployeeTransformer;

class StoreEmployeeController
{
    public function __invoke(StoreEmployeeRequest $request, StoreEmployeeAction $action): JsonResponse
    {
        $employee = $action->execute($request->toDto());
        
        return responder()
               ->success($employee, EmployeeTransformer::class)
               ->respond(JsonResponse::HTTP_CREATED);
    }
}
