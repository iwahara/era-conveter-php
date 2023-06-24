<?php

declare(strict_types=1);

namespace Iwahara\EraConveter\Wareki;

use DateTimeImmutable;

class Heisei implements WarekiInterface
{
    use WarekiTrait;

    /**
     * @var DateTimeImmutable
     */
    private $datetime;

    public function __construct(DateTimeImmutable $datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * @inheritDoc
     */
    public function resolve(): bool
    {
        //平成は1989年1月8日から2019年4月30日まで
        if (!$this->checkFrom($this->getYear(), $this->getMonth(), $this->getDay())) {
            return false;
        }
        if (!$this->checkTo($this->getYear(), $this->getMonth(), $this->getDay())) {
            return false;
        }

        return true;
    }

    private function checkTo(int $year, int $month, int $day): bool
    {
        //平成は31年4月30日まで
        if ($year > 31) {
            return false;
        }

        if ($year === 31 && $month > 4) {
            return false;
        }
        return true;
    }

    /**
     * 指定日時が元号の開始日以降ならtrue
     *
     * @return boolean
     */
    private function checkFrom(int $year, int $month, int $day): bool
    {
        //平成は1989年1月8日から

        if ($year < 1) {
            return false;
        }

        if ($year === 1 && $month === 1 && $day < 8) {
            return false;
        }

        return true;
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
        return '平成';
    }

    /**
     * @inheritDoc
     */
    public function getYear(): int
    {
        $date = getdate($this->datetime->getTimestamp());
        return $date['year'] - 1988;
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
