<?php


declare(strict_types=1);

namespace Lightit\Backoffice\Task\App\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Task\App\Requests\TaskRequest;
use Lightit\Backoffice\Task\App\Transformers\TaskTransformer;
use Lightit\Backoffice\Task\Domain\Actions\StoreTaskAction;

class StoreTaskController extends Controller
{
    public function __invoke(TaskRequest $request, StoreTaskAction $action): JsonResponse
    {
        $task = $action->execute($request->toDto());
        
        return responder()
               ->success($task, TaskTransformer::class)
               ->respond(JsonResponse::HTTP_CREATED);
    }
}
