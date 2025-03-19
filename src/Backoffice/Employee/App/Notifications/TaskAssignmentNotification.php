<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employee\App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Lightit\Backoffice\Task\Models\Task;

abstract class TaskAssignmentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(protected Task $task)
    {
    }

    /**
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    abstract protected function getSubject(): string;

    abstract protected function getBody(): string;

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage())
                ->subject($this->getSubject())
                ->greeting('Hey! You have a new notification!')
                ->view('mail.assigned-task', [
                    'task'    => $this->task,
                    'message' => $this->getBody(),
                ]);
    }

    public function toArray(object $notifiable): array
    {
        return [
            'task_id' => $this->task->id,
            'title' => $this->task->title,
            'description' => $this->task->description,
        ];
    }
}
