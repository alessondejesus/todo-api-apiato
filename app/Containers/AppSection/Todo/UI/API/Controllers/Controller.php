<?php

namespace App\Containers\AppSection\Todo\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Todo\Actions\CreateTodoAction;
use App\Containers\AppSection\Todo\Actions\DeleteTodoAction;
use App\Containers\AppSection\Todo\Actions\FindTodoByIdAction;
use App\Containers\AppSection\Todo\Actions\GetAllTodosAction;
use App\Containers\AppSection\Todo\Actions\UpdateTodoAction;
use App\Containers\AppSection\Todo\UI\API\Requests\CreateTodoRequest;
use App\Containers\AppSection\Todo\UI\API\Requests\DeleteTodoRequest;
use App\Containers\AppSection\Todo\UI\API\Requests\FindTodoByIdRequest;
use App\Containers\AppSection\Todo\UI\API\Requests\GetAllTodosRequest;
use App\Containers\AppSection\Todo\UI\API\Requests\UpdateTodoRequest;
use App\Containers\AppSection\Todo\UI\API\Transformers\TodoTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class Controller extends ApiController
{
    /**
     * @param CreateTodoRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createTodo(CreateTodoRequest $request): JsonResponse
    {
        $todo = app(CreateTodoAction::class)->run($request);

        return $this->created($this->transform($todo, TodoTransformer::class));
    }

    /**
     * @param FindTodoByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findTodoById(FindTodoByIdRequest $request): array
    {
        $todo = app(FindTodoByIdAction::class)->run($request);

        return $this->transform($todo, TodoTransformer::class);
    }

    /**
     * @param GetAllTodosRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllTodos(GetAllTodosRequest $request): array
    {
        $todos = app(GetAllTodosAction::class)->run($request);

        return $this->transform($todos, TodoTransformer::class);
    }

    /**
     * @param UpdateTodoRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateTodo(UpdateTodoRequest $request): array
    {
        $todo = app(UpdateTodoAction::class)->run($request);

        return $this->transform($todo, TodoTransformer::class);
    }

    /**
     * @param DeleteTodoRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     */
    public function deleteTodo(DeleteTodoRequest $request): JsonResponse
    {
        app(DeleteTodoAction::class)->run($request);

        return $this->noContent();
    }
}
