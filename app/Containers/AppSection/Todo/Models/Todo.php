<?php

namespace App\Containers\AppSection\Todo\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use Carbon\Carbon;
use Illuminate\Support\Collection;


/**
 * @property int $id
 * @property string $tittle
 * @property string $description
 * @property int $status
 * @property int $user_id
 * @property Carbon $expectation_of_completion
 * @property Carbon $completion_date
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * Relationships
 * @property Collection $user
 */
class Todo extends ParentModel
{
    protected $fillable = [
        'tittle',
        'description',
        'status',
        'user_id',
        'expectation_of_completion',
        'completion_date',
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
