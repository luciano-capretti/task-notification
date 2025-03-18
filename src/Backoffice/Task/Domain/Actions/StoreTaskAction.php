<?php


declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Actions;

use Backoffice\Task\Domain\Actions\DataTransferObjects\TaskDto;
use Lightit\Backoffice\Employee\App\Notifications\ReassignTaskAssignmentNotification;
use Lightit\Backoffice\Employee\Models\Employee;
use Lightit\Backoffice\Task\Models\Task;

class StoreTaskAction
{
    public function execute(TaskDto $taskDto): Task
    {
        $task = Task::create($taskDto);

        $employee = Employee::findOrFail($taskDto->getEmployeeId());
        $employee->notify(new ReassignTaskAssignmentNotification($taskDto));

        return $task;
    }
}
