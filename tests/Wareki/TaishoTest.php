<?php

declare(strict_types=1);

namespace Tests\Iwahara\EraConveter\Wareki;

use PHPUnit\Framework\TestCase;
use DateTimeImmutable;
use Iwahara\EraConveter\Wareki\Taisho;

class TaishoTest extends TestCase
{
    /**
     * @test
     */
    public function test_resolve_今から大正()
    {
        $datetime = new DateTimeImmutable("1912-07-30 00:00:00");
        $reiwa = new Taisho($datetime);
        self::assertTrue($reiwa->resolve());
    }

    /**
     * @test
     */
    public function test_resolve_まだ明治()
    {
        $datetime = new DateTimeImmutable("1912-07-29 00:00:00");
        $reiwa = new Taisho($datetime);
        self::assertFalse($reiwa->resolve());
    }

    /**
     * @test
     */
    public function test_resolve_今から昭和()
    {
        $datetime = new DateTimeImmutable("1926-12-25 00:00:00");
        $reiwa = new Taisho($datetime);
        self::assertFalse($reiwa->resolve());
    }

    /**
     * @test
     */
    public function test_resolve_まだ大正()
    {
        $datetime = new DateTimeImmutable("1926-12-24 00:00:00");
        $reiwa = new Taisho($datetime);
        self::assertTrue($reiwa->resolve());
    }
}
