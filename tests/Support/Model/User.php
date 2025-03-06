<?php
declare(strict_types=1);

namespace UzDevid\Converter\Tests\Support\Model;

readonly class User {
    /**
     * @param string $name
     * @param string $surname
     */
    public function __construct(
        public string $name,
        public string $surname
    ) {
    }
}