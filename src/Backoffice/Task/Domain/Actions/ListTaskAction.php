<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Actions;

use Illuminate\Database\Eloquent\Collection;
use Lightit\Backoffice\Task\Models\Task;

class ListTaskAction
{
    /**
     * execute
     *
     * @return Collection <int, Task>
     */
    public function execute(): Collection
    {
        return Task::all();
    }
}
