<?php

/**
 * @apiGroup           Todo
 * @apiName            DeleteTodo
 *
 * @api                {DELETE} /v1/todos/:id Delete Todo
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\Todo\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::delete('todos/{id}', [Controller::class, 'deleteTodo'])
    ->middleware(['auth:api']);

