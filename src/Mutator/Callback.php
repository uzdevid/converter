<?php declare(strict_types=1);

namespace UzDevid\Converter\Mutator;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
final class Callback extends Mutator {
    /**
     * @param array $callback
     * @param string ...$properties
     */
    public function __construct(private readonly array $callback, string ...$properties) {
        parent::__construct($properties);
    }

    /**
     * @return mixed
     */
    public function handle(): mixed {
        return call_user_func($this->callback, ...$this->getArguments());
    }
}