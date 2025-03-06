<?php declare(strict_types=1);

namespace UzDevid\Converter\Tests\Support\Dto;

use UzDevid\Converter\Mutator\CallbackMutator;
use UzDevid\Converter\Mutator\FromNameMutator;
use UzDevid\Converter\Tests\Support\Mutator\TimeReformat;

class OrderDto {
    public int $id;
    #[FromNameMutator('product_id')]
    public int $productId;
    public int $amount;
    #[FromNameMutator('order_time')]
    #[CallbackMutator([TimeReformat::class, 'toUiFormat'], 'order_time')]
    public string $orderTime;
}