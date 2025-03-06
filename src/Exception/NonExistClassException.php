<?php
declare(strict_types=1);

namespace UzDevid\Converter\Exception;

use Yiisoft\Hydrator\Exception\NonInstantiableException;

class NonExistClassException extends NonInstantiableException {
    /**
     * @param string $class
     */
    public function __construct(string $class) {
        parent::__construct(sprintf('Class "%s" not exist.', $class),);
    }
}