<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Task\Domain\Enums;

enum StatusEnum: string
{
    case TODO = 'TO_DO';
    case INPROGRESS = 'IN_PROGRESS';
    case ACCEPTED = 'ACCEPTED';

    public static function values(): array
    {
        return array_column(StatusEnum::cases(), 'value');
    }
}
