<?php
declare(strict_types=1);

namespace UzDevid\Converter\Tests\Support\Mutator;

class TimeReformat {
    /**
     * @param string $datetime
     * @return string
     */
    public static function toUiFormat(string $datetime): string {
        return date('H:i d.m.Y', strtotime($datetime));
    }
}