<?php declare(strict_types=1);

namespace UzDevid\Converter;

use Yiisoft\Arrays\ArrayableInterface;
use Yiisoft\Arrays\ArrayableTrait;

readonly final class InputData implements ArrayableInterface {
    use ArrayableTrait;

    private array|object $data;

    /**
     * @param array|object $data
     */
    public function __construct(array|object $data) {
        if ($data instanceof ArrayableInterface) {
            $data = $data->toArray();
        }

        $this->data = $data;
    }

    /**
     * @param string $propertyName
     * @return mixed
     */
    public function getValue(string $propertyName): mixed {
        return is_array($this->data) ? $this->data[$propertyName] : $this->data->{$propertyName};
    }

    /**
     * @param string $propertyName
     * @return bool
     */
    public function hasProperty(string $propertyName): bool {
        return is_array($this->data) ? isset($this->data[$propertyName]) : isset($this->data->{$propertyName});
    }
}