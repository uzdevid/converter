<?php
declare(strict_types=1);

namespace UzDevid\Converter;

interface BuilderInterface {
    public function build(): mixed;
}