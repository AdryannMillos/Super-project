<?php

declare(strict_types=1);

namespace App\Enum;

use Illuminate\Validation\Rules\Enum;

final class ChampionshipEnum extends Enum
{
    public const STANDBY = 'standby';
    public const CURRENT = 'current';
    public const CANCELED = 'canceled';
    public const FINISHED = 'finished';

    public static function getOptions(): array
    {
        return [
            self::STANDBY,
            self::CURRENT,
            self::CANCELED,
            self::FINISHED
        ];
    }

    protected function getDataIdentifier(): string
    {
        return 'Championship Status';
    }
}
