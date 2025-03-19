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
        $task = Task::create([
            'id' => $taskDto->getId(),
            'title' => $taskDto->getTitle(),
            'description' => $taskDto->getDescription(),
            'status' => $taskDto->getStatus()->value,
            'employee_id' => $taskDto->getEmployeeId(),
        ]);

        $notification = new ReassignTaskAssignmentNotification($task);

        $employee = Employee::find($task->employee_id);
        if ($employee) {
            $employee->notify($notification);
        }
        
        return $task;
    }
}
