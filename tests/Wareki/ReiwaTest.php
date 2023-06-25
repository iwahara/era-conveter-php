<?php

declare(strict_types=1);

namespace Tests\Iwahara\EraConveter\Wareki;

use DateTimeImmutable;
use Iwahara\EraConveter\Wareki\Reiwa;
use PHPUnit\Framework\TestCase;

class ReiwaTest extends TestCase
{
    /**
     * @test
     */
    public function test_resolve_今から令和()
    {
        $datetime = new DateTimeImmutable("2019-05-01 00:00:00");
        $reiwa = new Reiwa($datetime);
        self::assertTrue($reiwa->resolve());
    }

    /**
     * @test
     */
    public function test_resolve_まだ平成()
    {
        $datetime = new DateTimeImmutable("2019-04-30 00:00:00");
        $reiwa = new Reiwa($datetime);
        self::assertFalse($reiwa->resolve());
    }

    /**
     * @test
     *
     */
    public function test_tostring_元年()
    {
        $datetime = new DateTimeImmutable("2019-05-01 00:00:00");
        $reiwa = new Reiwa($datetime);
        self::assertSame($reiwa->__toString(), "令和元年5月1日");
    }

    /**
     * @test
     *
     */
    public function test_tostring_数字年()
    {
        $datetime = new DateTimeImmutable("2020-05-01 00:00:00");
        $reiwa = new Reiwa($datetime);
        self::assertSame($reiwa->__toString(), "令和2年5月1日");
    }
}
