<?php
declare(strict_types=1);

namespace UzDevid\Converter\Tests\Support\Model;

class Person {
    /**
     * @param string $full_name
     */
    public function __construct(public string $full_name) { }
}