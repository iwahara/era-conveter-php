<?php

declare(strict_types=1);

namespace Tests\Iwahara\EraConveter\Wareki;

use PHPUnit\Framework\TestCase;
use DateTimeImmutable;
use Iwahara\EraConveter\Wareki\Meiji;

class MeijiTest extends TestCase
{
    /**
     * @test
     */
    public function test_resolve_今から明治()
    {
        $datetime = new DateTimeImmutable("1873-01-01 00:00:00");
        $reiwa = new Meiji($datetime);
        self::assertTrue($reiwa->resolve());
    }

    /**
     * @test
     */
    public function test_resolve_まだ明治だけど太陰暦なので対象外()
    {
        $datetime = new DateTimeImmutable("1872-12-31 00:00:00");
        $reiwa = new Meiji($datetime);
        self::assertFalse($reiwa->resolve());
    }

    /**
     * @test
     */
    public function test_resolve_今から大正()
    {
        $datetime = new DateTimeImmutable("1912-07-30 00:00:00");
        $reiwa = new Meiji($datetime);
        self::assertFalse($reiwa->resolve());
    }

    /**
     * @test
     */
    public function test_resolve_まだ明治()
    {
        $datetime = new DateTimeImmutable("1912-07-29 00:00:00");
        $reiwa = new Meiji($datetime);
        self::assertTrue($reiwa->resolve());
    }
}
