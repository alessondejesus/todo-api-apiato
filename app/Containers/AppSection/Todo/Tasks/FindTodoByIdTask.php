<?php

namespace App\Containers\AppSection\Todo\Tasks;

use App\Containers\AppSection\Todo\Data\Repositories\TodoRepository;
use App\Containers\AppSection\Todo\Models\Todo;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindTodoByIdTask extends ParentTask
{
    public function __construct(
        protected TodoRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Todo
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
