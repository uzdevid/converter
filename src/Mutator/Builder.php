<?php
declare(strict_types=1);

namespace UzDevid\Converter\Mutator;

use Attribute;
use ReflectionClass;
use ReflectionException;
use UzDevid\Converter\BuilderInterface;
use UzDevid\Converter\Exception\InvalidImplementationClassException;
use UzDevid\Converter\Exception\NonExistClassException;
use UzDevid\Converter\StaticArgument;

#[Attribute(Attribute::TARGET_PROPERTY)]
final class Builder extends Mutator {
    private string $builderClass;

    /**
     * @psalm-param class-string $builderClass
     * @param StaticArgument|string ...$property
     */
    public function __construct(string $builderClass, StaticArgument|string...$property) {
        if (!class_exists($builderClass)) {
            throw new NonExistClassException($builderClass);
        }

        $this->builderClass = $builderClass;
        parent::__construct($property);
    }

    /**
     * @return mixed
     * @throws ReflectionException
     */
    public function handle(): mixed {
        $reflection = new ReflectionClass($this->builderClass);

        $instance = $reflection->newInstance(...$this->getArguments());

        if (!($instance instanceof BuilderInterface)) {
            throw new InvalidImplementationClassException($instance::class, BuilderInterface::class);
        }

        return call_user_func([$instance, 'build']);
    }
}