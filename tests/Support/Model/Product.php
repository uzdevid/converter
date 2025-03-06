<?php
declare(strict_types=1);

namespace UzDevid\Converter\Tests\Support\Model;

readonly class Product {
    /**
     * @param int $id
     * @param string $title
     * @param Category $category
     */
    public function __construct(
        public int      $id,
        public string   $title,
        public Category $category
    ) {
    }
}