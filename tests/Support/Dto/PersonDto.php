<?php
declare(strict_types=1);

namespace UzDevid\Converter\Tests\Support\Dto;

use UzDevid\Converter\Mutator\Builder;
use UzDevid\Converter\StaticArgument;
use UzDevid\Converter\Tests\Support\Builder\SplitNameBuilder;

class PersonDto {
    #[Builder(SplitNameBuilder::class, 'full_name', new StaticArgument(1))]
    public string $fName;

    #[Builder(SplitNameBuilder::class, 'full_name', new StaticArgument(2))]
    public string $lName;
}