<?php
declare(strict_types=1);

namespace UzDevid\Converter\Tests\Support\Dto;

use UzDevid\Converter\Mutator\FromNameMutator;

class ProductDto {
    public int $id;
    public string $title;
    #[FromNameMutator('category')]
    public CategoryDto $catalog;
}