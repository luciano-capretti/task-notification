<?php


declare(strict_types=1);

namespace Lightit\Backoffice\Employee\App\Controllers;

use App\Backoffice\Employee\Domain\Actions\ListEmployeeAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Employee\App\Transformers\EmployeeTransformer;

class ListEmployeeController extends Controller
{
    public function __invoke(ListEmployeeAction $action): JsonResponse
    {
        $employee = $action->execute();

        return responder()
               ->success($employee, EmployeeTransformer::class)
               ->respond();
    }
}
