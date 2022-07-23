<?php

namespace App\Containers\AppSection\Todo\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Todo\Data\Repositories\TodoRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllTodosTask extends ParentTask
{
    public function __construct(
        protected TodoRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $user = Auth::user();

        $query = $this->addRequestCriteria()
            ->repository;

        if (!$user->hasAdminRole()) {
            $query->scopeQuery(function ($query) use ($user) {
                return $query->where('user_id', $user->id);
            });
        }

        return $query->paginate();
    }
}
