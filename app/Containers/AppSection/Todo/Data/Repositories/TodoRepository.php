<?php

namespace App\Containers\AppSection\Todo\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class TodoRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'tittle' => 'like',
        'status' => '='
        // ...
    ];
}
