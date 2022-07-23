<?php

namespace App\Containers\AppSection\Todo\Data\Factories;

use App\Containers\AppSection\Todo\Models\Todo;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class TodoFactory extends ParentFactory
{
    protected $model = Todo::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
