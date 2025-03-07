<?php declare(strict_types=1);

namespace UzDevid\Converter;

readonly final class StaticArgument {
    /**
     * @param mixed $value
     */
    public function __construct(
        private mixed $value
    ) {
    }

    /**
     * @return mixed
     */
    public function getValue(): mixed {
        return $this->value;
    }
}