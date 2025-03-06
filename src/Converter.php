<?php declare(strict_types=1);

namespace UzDevid\Converter;

use ReflectionClass;
use ReflectionException;
use ReflectionProperty;
use Yiisoft\Hydrator\Exception\NonExistClassException;
use Yiisoft\Hydrator\Exception\NonInstantiableException;
use Yiisoft\Hydrator\HydratorInterface;

readonly final class Converter {
    /**
     * @param HydratorInterface $hydrator
     */
    public function __construct(
        private HydratorInterface $hydrator
    ) {
    }

    /**
     * Creates an object and hydrates it with data.
     *
     * @param string $class The class name to create.
     * @param array|object $data Data to hydrate an object with.
     * @param array $except
     *
     * @return object Created and hydrated object.
     *
     * @psalm-template T
     * @psalm-param class-string<T> $class
     * @psalm-return T
     * @throws NonInstantiableException
     * @throws ReflectionException
     */
    public function convert(string $class, mixed $data, array $except = []): object {
        if (!class_exists($class)) {
            throw new NonExistClassException($class);
        }

        $inputData = new InputData($data);
        $reflection = new ReflectionClass($class);

        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);

        $arguments = [];

        foreach ($properties as $property) {
            if (in_array($property->name, $except, true)) {
                continue;
            }

            $arguments[$property->name] = ValueResolver::resolve($property, $inputData, $this);
        }

        return $this->hydrator->create($class, $arguments);
    }
}