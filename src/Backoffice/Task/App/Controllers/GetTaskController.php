<?php
  

declare(strict_types=1);

namespace Lightit\Backoffice\Task\App\Controllers;


use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Task\Models\Task;
use Lightit\Backoffice\Task\App\Transformers\TaskTransformer;
use Lightit\Backoffice\Task\Domain\Actions\GetTaskAction;

class GetTaskController 
{
    public function __invoke(Task $task, GetTaskAction $action): JsonResponse
    {
        $task = $action->execute($task);
        
        return responder()
               ->success($task, TaskTransformer::class)
               ->respond();
    }
}
