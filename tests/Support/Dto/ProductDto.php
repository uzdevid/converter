<?php
declare(strict_types=1);

namespace UzDevid\Converter\Tests\Support\Dto;

use UzDevid\Converter\Mutator\From;

class ProductDto {
    public int $id;
    public string $title;
    #[From('category')]
    public CategoryDto $catalog;
}