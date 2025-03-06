<?php

namespace UzDevid\Converter;

interface ConvertableInterface {
    /**
     * @param mixed $data Data to hydrate an object with.
     * @param array $except
     *
     * @return static Created and hydrated object.
     *
     */
    public static function convert(mixed $data, array $except = []): static;
}