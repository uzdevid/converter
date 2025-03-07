<?php
declare(strict_types=1);

namespace UzDevid\Converter\Tests\Support\Model;

use UzDevid\Converter\ConvertableInterface;
use UzDevid\Converter\Trait\Converter;

class Category implements ConvertableInterface {
    use Converter;
    
    /**
     * @param int $id
     * @param string $title
     */
    public function __construct(
        public int    $id,
        public string $title
    ) {
    }
}