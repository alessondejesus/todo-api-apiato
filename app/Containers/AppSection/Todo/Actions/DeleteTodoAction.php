<?php

namespace App\Containers\AppSection\Todo\Actions;

use App\Containers\AppSection\Todo\Tasks\DeleteTodoTask;
use App\Containers\AppSection\Todo\UI\API\Requests\DeleteTodoRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteTodoAction extends ParentAction
{
    /**
     * @param DeleteTodoRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteTodoRequest $request): int
    {
        return app(DeleteTodoTask::class)->run($request->id);
    }
}
