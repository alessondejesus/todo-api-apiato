<?php

namespace App\Containers\AppSection\Todo\UI\API\Transformers;

use App\Containers\AppSection\Todo\Models\Todo;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class TodoTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Todo $todo): array
    {
        $response = [
            'object' => $todo->getResourceKey(),
            'id' => $todo->getHashedKey(),
            'tittle' => $todo->tittle,
            'description' => $todo->description,
            'status' => $todo->status,
            'expectation_of_completion' => $todo->expectation_of_completion,
            'completion_date' => $todo->completion_date,
            'created_at' => $todo->created_at->format('Y/m/d'),
            'updated_at' => $todo->updated_at->format('Y/m/d'),
            'user' => [
              'email' => $todo->user->email,
            ],
            'readable_created_at' => $todo->created_at->diffForHumans(),
            'readable_updated_at' => $todo->updated_at->diffForHumans(),
        ];

        return $this->ifAdmin([
            'real_id' => $todo->id,
        ], $response);
    }
}
