<?php

declare(strict_types=1);

namespace Iwahara\EraConveter\Wareki;

use DateTimeInterface;
use Iwahara\EraConveter\Wareki\WarekiInterface;
use ReturnTypeWillChange;

class Reiwa implements WarekiInterface
{
    use WarekiTrait;
    /**
     * @var DatetimeInterface
     */
    private $datetime;

    public function __construct(DateTimeInterface $datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * @inheritDoc
     */
    public function resolve(): bool
    {
        //令和は2019/05/01から
        if ($this->getYear() < 1) {
            return false;
        }
        //2020年以降は確実に令和（今のところ）
        if ($this->getYear() > 1) {
            return true;
        }
        //ここから2019年の話
        if ($this->getMonth() >= 5) {
            return true;
        }
        return false;
    }

    public function __toString(): string
    {
        $yearString = $this->getYearString($this->getYear());
        $gengo = $this->getGengo();
        $month = $this->getMonth();
        $day = $this->getDay();

        return "{$gengo}{$yearString}年{$month}月{$day}日";
    }

    /**
     * @inheritDoc
     */
    public function getGengo(): string
    {
        return '令和';
    }

    /**
     * @inheritDoc
     */
    public function getYear(): int
    {
        $date = getdate($this->datetime->getTimestamp());
        return $date['year'] - 2018;
    }

    /**
     * @inheritDoc
     */
    public function getMonth(): int
    {
        $date = getdate($this->datetime->getTimestamp());
        return $date['mon'];
    }

    /**
     * @inheritDoc
     */
    public function getDay(): int
    {
        $date = getdate($this->datetime->getTimestamp());
        return $date['mday'];
    }
}
