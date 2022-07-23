<?php

namespace App\Containers\AppSection\Todo\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Todo\Tasks\GetAllTodosTask;
use App\Containers\AppSection\Todo\UI\API\Requests\GetAllTodosRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllTodosAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllTodosRequest $request): mixed
    {
        return app(GetAllTodosTask::class)->run();
    }
}
