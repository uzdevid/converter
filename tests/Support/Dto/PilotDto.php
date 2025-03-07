<?php
declare(strict_types=1);

namespace UzDevid\Converter\Tests\Support\Dto;

use UzDevid\Converter\Mutator\Builder;
use UzDevid\Converter\Tests\Support\Abstraction\Airplane;
use UzDevid\Converter\Tests\Support\Builder\AirplaneBuilder;

class PilotDto {
    #[Builder(AirplaneBuilder::class, 'airplane')]
    public Airplane $airplane;
}