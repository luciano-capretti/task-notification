<?php

namespace App\Backoffice\Employee\App\Controllers;

use App\Actions\Employee\StoreEmployeeAction;
use App\Http\Controllers\Controller;
use App\Requests\StoreEmployeeRequest;
use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Employee\App\Transformers\EmployeeTransformer;

class StoreEmployeeController extends Controller
{
    public function __invoke(StoreEmployeeRequest $request, StoreEmployeeAction $action): JsonResponse
    {
        $employee = $action->execute($request);
        
        return responder()
               ->success($employee, EmployeeTransformer::class)
               ->respond(JsonResponse::HTTP_CREATED);
    }
}
