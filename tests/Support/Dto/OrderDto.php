<?php declare(strict_types=1);

namespace UzDevid\Converter\Tests\Support\Dto;

use UzDevid\Converter\Mutator\Callback;
use UzDevid\Converter\Mutator\From;
use UzDevid\Converter\Tests\Support\Mutator\TimeReformat;

class OrderDto {
    public int $id;
    #[From('product_id')]
    public int $productId;
    public int $amount;
    #[From('order_time')]
    #[Callback([TimeReformat::class, 'toUiFormat'], 'order_time')]
    public string $orderTime;
}