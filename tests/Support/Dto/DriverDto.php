<?php
declare(strict_types=1);

namespace UzDevid\Converter\Tests\Support\Dto;

use UzDevid\Converter\Mutator\Builder;
use UzDevid\Converter\Tests\Support\Abstraction\CarInterface;
use UzDevid\Converter\Tests\Support\Builder\CarBuilder;

class DriverDto {
    #[Builder(CarBuilder::class, 'car')]
    public CarInterface $car;
}