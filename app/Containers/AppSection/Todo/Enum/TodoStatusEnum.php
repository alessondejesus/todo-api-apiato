<?php

namespace App\Containers\AppSection\Todo\Enum;

use Spatie\Enum\Enum;

/**
 * @method static self pendent()
 * @method static self doing()
 * @method static self concluded()
 */
class TodoStatusEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'pendent' => 1,
            'doing' => 2,
            'concluded' => 3,
        ];
    }
}
