<?php


declare(strict_types=1);

namespace Lightit\Backoffice\Task\App\Controllers;

use Backoffice\Task\Domain\Actions\UpdateTaskAction;
use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Task\App\Requests\TaskRequest;
use Lightit\Backoffice\Task\App\Transformers\TaskTransformer;

class UpdateTaskController
{
    public function __invoke(TaskRequest $request, UpdateTaskAction $action): JsonResponse
    {
        $task = $action->execute($request->toDto());
        
        return responder()
               ->success($task, TaskTransformer::class)
               ->respond(JsonResponse::HTTP_CREATED);
    }
}
