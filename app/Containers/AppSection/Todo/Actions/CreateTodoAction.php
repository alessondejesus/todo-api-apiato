<?php

namespace App\Containers\AppSection\Todo\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Todo\Models\Todo;
use App\Containers\AppSection\Todo\Tasks\CreateTodoTask;
use App\Containers\AppSection\Todo\UI\API\Requests\CreateTodoRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Facades\Auth;

class CreateTodoAction extends ParentAction
{
    /**
     * @param CreateTodoRequest $request
     * @return Todo
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateTodoRequest $request): Todo
    {
        $data = $request->sanitizeInput([
            'tittle',
            'description',
            'status',
            'expectation_of_completion',
            'completion_date'
        ]);

        $data['user_id'] = Auth::id();

        return app(CreateTodoTask::class)->run($data);
    }
}
