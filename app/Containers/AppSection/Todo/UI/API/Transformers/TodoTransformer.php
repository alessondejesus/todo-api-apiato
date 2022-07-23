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
        ];

        return $this->ifAdmin([
            'real_id' => $todo->id,
            'created_at' => $todo->created_at,
            'updated_at' => $todo->updated_at,
            'readable_created_at' => $todo->created_at->diffForHumans(),
            'readable_updated_at' => $todo->updated_at->diffForHumans(),
            // 'deleted_at' => $todo->deleted_at,
        ], $response);
    }
}
