<?php
declare(strict_types=1);

namespace UzDevid\Converter\Tests\Support\Builder;

use UzDevid\Converter\BuilderInterface;
use UzDevid\Converter\Tests\Support\Dto\F15;

class AirplaneBuilder implements BuilderInterface {
    /**
     * @param array $airplane
     */
    public function __construct(
        private array $airplane
    ) {
    }

    /**
     * @return F15
     */
    public function build(): F15 {
        return new F15();
    }
}