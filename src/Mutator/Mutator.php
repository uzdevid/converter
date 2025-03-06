<?php
declare(strict_types=1);

namespace UzDevid\Converter\Mutator;

use UzDevid\Converter\InputData;
use UzDevid\Converter\StaticArgument;

abstract class Mutator {
    private InputData $inputData;

    /**
     * @var StaticArgument[]
     */
    private array $staticArguments = [];

    /**
     * @param array $properties
     */
    public function __construct(protected array $properties) {
        foreach ($this->properties as $index => $property) {
            if ($property instanceof StaticArgument) {
                $this->staticArguments[] = $property;
                unset($this->properties[$index]);
            }
        }
    }

    /**
     * @param InputData $inputData
     * @return Mutator
     */
    public function setInputData(InputData $inputData): static {
        $this->inputData = $inputData;
        return $this;
    }

    /**
     * @return InputData
     */
    protected function getInputData(): InputData {
        return $this->inputData;
    }

    /**
     * @return array
     */
    public function getArguments(): array {
        $values = [];
        foreach ($this->properties as $property) {
            $values[] = $this->inputData->getValue($property);
        }

        if (empty($this->staticArguments)) {
            return $values;
        }

        foreach ($this->staticArguments as $staticArgument) {
            $values[] = $staticArgument->getValue();
        }

        return $values;
    }

    /**
     * @return object
     */
    abstract public function handle(): mixed;
}