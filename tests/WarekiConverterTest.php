<?php

declare(strict_types=1);

namespace Tests\Iwahara\EraConveter\Wareki;

use DateTimeImmutable;
use Iwahara\EraConveter\Wareki\Heisei;
use Iwahara\EraConveter\Wareki\Meiji;
use Iwahara\EraConveter\Wareki\Reiwa;
use Iwahara\EraConveter\Wareki\Showa;
use Iwahara\EraConveter\Wareki\Taisho;
use Iwahara\EraConveter\WarekiConverter;
use PHPUnit\Framework\TestCase;

class WarekiConverterTest extends TestCase
{

    public function test_convert_明治()
    {
        $datetime = new DateTimeImmutable("1912-07-29 00:00:00");
        $converter = new WarekiConverter();
        $wareki = $converter->convert($datetime);

        self::assertInstanceOf(Meiji::class, $wareki);
    }

    public function test_convert_大正()
    {
        $datetime = new DateTimeImmutable("1912-07-30 00:00:00");
        $converter = new WarekiConverter();
        $wareki = $converter->convert($datetime);

        self::assertInstanceOf(Taisho::class, $wareki);
    }

    public function test_convert_昭和()
    {
        $datetime = new DateTimeImmutable("1927-01-01 00:00:00");
        $converter = new WarekiConverter();
        $wareki = $converter->convert($datetime);

        self::assertInstanceOf(Showa::class, $wareki);
    }

    public function test_convert_平成()
    {
        $datetime = new DateTimeImmutable("1990-01-01 00:00:00");
        $converter = new WarekiConverter();
        $wareki = $converter->convert($datetime);

        self::assertInstanceOf(Heisei::class, $wareki);
    }

    public function test_convert_令和()
    {
        $datetime = new DateTimeImmutable("2022-01-01 00:00:00");
        $converter = new WarekiConverter();
        $wareki = $converter->convert($datetime);

        self::assertInstanceOf(Reiwa::class, $wareki);
    }
}
