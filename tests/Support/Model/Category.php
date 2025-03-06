<?php
declare(strict_types=1);

namespace UzDevid\Converter\Tests\Support\Model;

class Category {
    /**
     * @param int $id
     * @param string $title
     */
    public function __construct(
        public int    $id,
        public string $title
    ) {
    }
}