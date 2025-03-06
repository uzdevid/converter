<?php
declare(strict_types=1);

namespace UzDevid\Converter\Tests\Support\Builder;

use UzDevid\Converter\BuilderInterface;
use UzDevid\Converter\Tests\Support\Dto\Carnival;

class CarBuilder implements BuilderInterface {
    /**
     * @param array $car
     */
    public function __construct(
        private array $car
    ) {
    }

    /**
     * @return Carnival
     */
    public function build(): Carnival {
        return new Carnival();
    }
}