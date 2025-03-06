<?php
declare(strict_types=1);

namespace UzDevid\Converter\Tests\Support\Model;

class Order {
    /**
     * @param int $id
     * @param int $product_id
     * @param int $amount
     * @param string $order_time
     */
    public function __construct(
        public int    $id,
        public int    $product_id,
        public int    $amount,
        public string $order_time
    ) {
    }
}