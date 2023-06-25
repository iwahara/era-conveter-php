<?php

declare(strict_types=1);

namespace Tests\Iwahara\EraConveter\Wareki;

use PHPUnit\Framework\TestCase;
use DateTimeImmutable;
use Iwahara\EraConveter\Wareki\Heisei;

class HeiseiTest extends TestCase
{

    /**
     * @test
     */
    public function test_resolve_今から平成()
    {
        $datetime = new DateTimeImmutable("1989-01-08 00:00:00");
        $reiwa = new Heisei($datetime);
        self::assertTrue($reiwa->resolve());
    }

    /**
     * @test
     */
    public function test_resolve_まだ昭和()
    {
        $datetime = new DateTimeImmutable("1989-01-07 00:00:00");
        $reiwa = new Heisei($datetime);
        self::assertFalse($reiwa->resolve());
    }

    /**
     * @test
     */
    public function test_resolve_今から令和()
    {
        $datetime = new DateTimeImmutable("2019-05-01 00:00:00");
        $reiwa = new Heisei($datetime);
        self::assertFalse($reiwa->resolve());
    }

    /**
     * @test
     */
    public function test_resolve_まだ平成()
    {
        $datetime = new DateTimeImmutable("2019-04-30 00:00:00");
        $reiwa = new Heisei($datetime);
        self::assertTrue($reiwa->resolve());
    }
}
