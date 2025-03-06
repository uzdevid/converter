<?php
declare(strict_types=1);

namespace UzDevid\Converter\Exception;

use Yiisoft\Hydrator\Exception\NonInstantiableException;

class InvalidImplementationClassException extends NonInstantiableException {
    /**
     * @param string $class
     * @param string $interface
     */
    public function __construct(string $class, string $interface) {
        parent::__construct(sprintf('Class "%s" is not implementation of "%s"', $class, $interface));
    }
}