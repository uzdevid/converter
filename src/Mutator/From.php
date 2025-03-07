<?php
declare(strict_types=1);

namespace UzDevid\Converter\Mutator;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
final class From extends Mutator {
    /**
     * @param string $name
     * @param string ...$property
     */
    public function __construct(private readonly string $name, string ...$property) {
        parent::__construct($property);
    }

    /**
     * @return mixed
     */
    public function handle(): mixed {
        return $this->getInputData()->getValue($this->name);
    }
}