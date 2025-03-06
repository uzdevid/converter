<?php
declare(strict_types=1);

namespace UzDevid\Converter\Tests\Support\Builder;

use UzDevid\Converter\BuilderInterface;

readonly final class SplitNameBuilder implements BuilderInterface {
    /**
     * @param string $fullName
     * @param int $part
     */
    public function __construct(
        private string $fullName,
        private int    $part
    ) {
    }

    /**
     * @return string
     */
    public function build(): string {
        return explode(' ', $this->fullName)[$this->part - 1];
    }
}