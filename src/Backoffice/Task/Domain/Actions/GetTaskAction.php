<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Actions;

use Backoffice\Task\Domain\Actions\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Task\Models\Task;

class GetTaskAction
{
    public function execute(Task $task): Task
    {
        return $task;
    }
}
