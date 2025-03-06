<?php
declare(strict_types=1);

namespace UzDevid\Converter\Exception;

class NonInstantiableException extends \Yiisoft\Hydrator\Exception\NonInstantiableException {
    /**
     * @param string $class
     */
    public function __construct(string $class) {
        parent::__construct(sprintf('Class "%s" non instantiable', $class),);
    }
}