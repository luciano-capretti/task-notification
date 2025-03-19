<?php
declare(strict_types=1);

namespace Backoffice\Task\Domain\Actions\DataTransferObjects;

use Lightit\Backoffice\Task\Domain\Enums\StatusEnum;

class TaskDto
{
    public function __construct(
        private readonly int $id, 
        private readonly string $title,
        private readonly string $description,
        private readonly StatusEnum $status,
        private readonly int $employee_id,
    ) {
    }
    

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }



    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getStatus(): StatusEnum
    {
        return $this->status;
    }

    public function getEmployeeId(): int
    {
        return $this->employee_id;
    }
}
