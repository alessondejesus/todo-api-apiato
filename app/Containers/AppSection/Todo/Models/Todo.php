<?php

namespace App\Containers\AppSection\Todo\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Todo extends ParentModel
{
    protected $fillable = [
        'description',
        'status',
        'user_id',

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Todo';
}
