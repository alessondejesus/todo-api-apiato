<?php

namespace App\Containers\AppSection\Todo\Tasks;

use App\Containers\AppSection\Todo\Data\Repositories\TodoRepository;
use App\Containers\AppSection\Todo\Models\Todo;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateTodoTask extends ParentTask
{
    public function __construct(
        protected TodoRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Todo
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
