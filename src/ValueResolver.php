<?php declare(strict_types=1);

namespace UzDevid\Converter;

use ReflectionAttribute;
use ReflectionClass;
use ReflectionException;
use ReflectionNamedType;
use ReflectionProperty;
use UzDevid\Converter\Exception\NonInstantiableException;
use UzDevid\Converter\Mutator\Mutator;

class ValueResolver {
    /**
     * @param ReflectionProperty $property
     * @param InputData $inputData
     * @param Converter $converter
     * @return mixed
     * @throws ReflectionException
     */
    public static function resolve(ReflectionProperty $property, InputData $inputData, Converter $converter): mixed {
        $attributes = $property->getAttributes(Mutator::class, ReflectionAttribute::IS_INSTANCEOF);

        $value = null;

        if ($inputData->hasProperty($property->getName())) {
            $value = $inputData->getValue($property->getName());
        }

        foreach ($attributes as $attribute) {
            /** @var Mutator $attributeInstance */
            $attributeInstance = $attribute->newInstance();

            $value = $attributeInstance->setInputData($inputData)->handle();
        }

        $type = $property->getType();

        if ($type instanceof ReflectionNamedType && $type->isBuiltin() === false) {
            $typeName = $type->getName();
            $valueReflection = new ReflectionClass($typeName);

            if (!$valueReflection->isInstantiable()) {
                if ($value instanceof $typeName) {
                    return $value;
                }

                throw new NonInstantiableException($type->getName());
            }

            $value = $converter->convert($type->getName(), $value);
        }

        return $value;
    }
}