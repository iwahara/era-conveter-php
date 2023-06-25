<?php

declare(strict_types=1);

namespace Iwahara\EraConveter\Wareki;

trait WarekiTrait
{
    private function getYearString(int $year): string
    {
        if ($year === 1) {
            return '元';
        }

        return "{$year}";
    }
}
