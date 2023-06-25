<?php

declare(strict_types=1);

namespace Iwahara\EraConveter;

use DateTimeImmutable;
use Iwahara\EraConveter\Exception\NotSupportedWarekiException;
use Iwahara\EraConveter\Wareki\Heisei;
use Iwahara\EraConveter\Wareki\Meiji;
use Iwahara\EraConveter\Wareki\Reiwa;
use Iwahara\EraConveter\Wareki\Showa;
use Iwahara\EraConveter\Wareki\Taisho;
use Iwahara\EraConveter\Wareki\WarekiInterface;

class WarekiConverter
{

    public function convert(DateTimeImmutable $datetime): WarekiInterface
    {
        /** @var array<WarekiInterface> */
        $warekiList = [
            new Meiji($datetime),
            new Taisho($datetime),
            new Showa($datetime),
            new Heisei($datetime),
            new Reiwa($datetime),
        ];
        foreach ($warekiList as $wareki) {
            if ($wareki->resolve()) {
                return $wareki;
            }
        }
        throw new NotSupportedWarekiException("サポートされていない日時を指定しました");
    }
}
