<?php

namespace App\Containers\AppSection\Todo\Actions;

use App\Containers\AppSection\Todo\Models\Todo;
use App\Containers\AppSection\Todo\Tasks\FindTodoByIdTask;
use App\Containers\AppSection\Todo\UI\API\Requests\FindTodoByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindTodoByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindTodoByIdRequest $request): Todo
    {
        return app(FindTodoByIdTask::class)->run($request->id);
    }
}
