<?php

namespace UzDevid\Converter\Trait;

use Yiisoft\Hydrator\Hydrator;

trait Converter {
    /**
     * @param mixed $data
     * @param array $except
     * @return static
     */
    public static function convert(mixed $data, array $except = []): static {
        return (new \UzDevid\Converter\Converter(new Hydrator()))->convert(static::class, $data, $except);
    }
}