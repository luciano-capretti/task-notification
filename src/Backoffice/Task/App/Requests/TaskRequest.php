<?php


declare(strict_types=1);

namespace Lightit\Backoffice\Task\App\Requests;

use Backoffice\Task\Domain\Actions\DataTransferObjects\TaskDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Lightit\Backoffice\Task\Domain\Enums\StatusEnum;

class TaskRequest extends FormRequest
{
    public const ID = 'id';
    public const TITLE = 'title';
    public const DESCRIPTION = 'description';
    public const STATUS = 'status';
    public const EMPLOYEE_ID = 'employee_id';

    public function rules(): array
    {
        return [
            self::ID => ['sometimes', 'exists:tasks,id'],
            self::TITLE => ['required', 'string', 'max:255'],
            self::DESCRIPTION => ['required', 'string'],
            self::STATUS => ['required', new Enum(StatusEnum::class)],
            self::EMPLOYEE_ID => ['required', 'exists:employees,id'],
        ];
    }

    public function toDto(): TaskDto
    {
        return new TaskDto(
            id: $this->integer(self::ID),
            title: $this->string(self::TITLE)->toString(),
            description: $this->string(self::DESCRIPTION)->toString(),
            status: $this->enum(self::STATUS, StatusEnum::class) ?? StatusEnum::TODO,
            employee_id: $this->integer(self::EMPLOYEE_ID)
        );
    }
}
