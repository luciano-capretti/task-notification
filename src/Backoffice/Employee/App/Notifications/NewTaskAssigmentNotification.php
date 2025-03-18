<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employee\App\Notifications;

use Lightit\Backoffice\Employee\App\Notifications\TaskAssignmentNotification;

class NewTaskAssignmentNotification extends TaskAssignmentNotification
{
    protected function getSubject(): string
    {
        return 'New task assigned, go and check what is it about';
    }

    protected function getBody(): string
    {
        return "You have been assigned a new task with title: {$this->task->title} 
                and id: {$this->task->id}, do not forget to make it.";
    }
}
