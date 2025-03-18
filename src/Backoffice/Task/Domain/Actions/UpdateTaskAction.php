<?php

declare(strict_types=1);

namespace Backoffice\Task\Domain\Actions;

use Backoffice\Task\Domain\Actions\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Employee\App\Notifications\NewTaskAssignmentNotification;
use Lightit\Backoffice\Employee\Models\Employee;
use Lightit\Backoffice\Task\Models\Task;

class UpdateTaskAction
{
    public function execute(TaskDto $taskDto): Task
    {
        $task = Task::findOrFail($taskDto->getId());

        $task->update([
            'title' => $taskDto->getTitle(),
            'description' => $taskDto->getDescription(),
            'status' => $taskDto->getStatus()->value,
            'employee_id' => $taskDto->getEmployeeId(),
        ]);

        if ($task->employee_id) {
            $employee = Employee::find($task->employee_id);
            if ($employee) {
                $employee->notify(new NewTaskAssignmentNotification($task));
            }
        }

        return $task;
    }
}
