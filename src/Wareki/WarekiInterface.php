<?php

declare(strict_types=1);

namespace Iwahara\EraConveter\Wareki;

/**
 * Japanese calendar interface
 * 
 */
interface WarekiInterface
{
    /**
     * String representation of Japanese calendar.
     *
     * @return string
     */
    public function __toString(): string;

    /**
     * resolve era.
     *
     * @return boolean
     */
    public function resolve(): bool;

    /**
     * get era name.
     *
     * @return string
     */
    public function getGengo(): string;

    /**
     * get year in era.
     *
     * @return int
     */
    public function getYear(): int;

    /**
     * get month in era.
     *
     * @return int
     */
    public function getMonth(): int;

    /**
     * get day in era.
     *
     * @return int
     */
    public function getDay(): int;
}
