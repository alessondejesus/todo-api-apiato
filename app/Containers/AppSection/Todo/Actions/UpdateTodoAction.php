<?php

namespace App\Containers\AppSection\Todo\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Todo\Models\Todo;
use App\Containers\AppSection\Todo\Tasks\UpdateTodoTask;
use App\Containers\AppSection\Todo\UI\API\Requests\UpdateTodoRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateTodoAction extends ParentAction
{
    /**
     * @param UpdateTodoRequest $request
     * @return Todo
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateTodoRequest $request): Todo
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateTodoTask::class)->run($data, $request->id);
    }
}
