<?php

declare(strict_types=1);

namespace Tests\Iwahara\EraConveter\Wareki;

use PHPUnit\Framework\TestCase;
use DateTimeImmutable;
use Iwahara\EraConveter\Wareki\Showa;

class ShowaTest extends TestCase
{
    /**
     * @test
     */
    public function test_resolve_今から昭和()
    {
        $datetime = new DateTimeImmutable("1926-12-25 00:00:00");
        $reiwa = new Showa($datetime);
        self::assertTrue($reiwa->resolve());
    }

    /**
     * @test
     */
    public function test_resolve_まだ大正()
    {
        $datetime = new DateTimeImmutable("1926-12-24 00:00:00");
        $reiwa = new Showa($datetime);
        self::assertFalse($reiwa->resolve());
    }

    /**
     * @test
     */
    public function test_resolve_今から平成()
    {
        $datetime = new DateTimeImmutable("1989-01-08 00:00:00");
        $reiwa = new Showa($datetime);
        self::assertFalse($reiwa->resolve());
    }

    /**
     * @test
     */
    public function test_resolve_まだ昭和()
    {
        $datetime = new DateTimeImmutable("1989-01-07 00:00:00");
        $reiwa = new Showa($datetime);
        self::assertTrue($reiwa->resolve());
    }
}
