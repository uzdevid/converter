<?php declare(strict_types=1);

namespace UzDevid\Converter\Tests;

use PHPUnit\Framework\TestCase;
use ReflectionException;
use UzDevid\Converter\Converter;
use UzDevid\Converter\Tests\Support\Dto\CategoryDto;
use UzDevid\Converter\Tests\Support\Dto\OrderDto;
use UzDevid\Converter\Tests\Support\Dto\PersonDto;
use UzDevid\Converter\Tests\Support\Dto\ProductDto;
use UzDevid\Converter\Tests\Support\Dto\UserDto;
use Yiisoft\Hydrator\Hydrator;

class ConvertFromArrayTest extends TestCase {
    /**
     * @throws ReflectionException
     */
    public function testCanBeConvert(): void {
        $hydrator = new Hydrator();
        $converter = new Converter($hydrator);

        $dto = $converter->convert(UserDto::class, ['name' => 'Alex', 'surname' => 'Brown']);

        $this->assertInstanceOf(UserDto::class, $dto);

        $this->assertSame('Alex', $dto->name);
        $this->assertSame('Brown', $dto->surname);
    }

    /**
     * @throws ReflectionException
     */
    public function testCanBeConvertNestedObjects(): void {
        $hydrator = new Hydrator();
        $converter = new Converter($hydrator);

        $dto = $converter->convert(ProductDto::class, ['id' => 1, 'title' => 'Samsung Note 10+', 'category' => ['id' => 1, 'title' => 'Mobile phones']]);

        $this->assertInstanceOf(ProductDto::class, $dto);
        $this->assertSame(1, $dto->id);
        $this->assertSame('Samsung Note 10+', $dto->title);

        $this->assertInstanceOf(CategoryDto::class, $dto->catalog);
        $this->assertSame(1, $dto->catalog->id);
        $this->assertSame('Mobile phones', $dto->catalog->title);
    }

    /**
     * @throws ReflectionException
     */
    public function testCanBeConvertWithMutation(): void {
        $hydrator = new Hydrator();
        $converter = new Converter($hydrator);

        $time = time();

        $dto = $converter->convert(OrderDto::class, ['id' => 1, 'product_id' => 1, 'amount' => 1000, 'order_time' => date('Y-m-d H:i:s', $time)]);

        $this->assertInstanceOf(OrderDto::class, $dto);
        $this->assertSame(1, $dto->id);
        $this->assertSame(1, $dto->productId);
        $this->assertSame(1000, $dto->amount);
        $this->assertSame(date('H:i d.m.Y', $time), $dto->orderTime);
    }

    /**
     * @throws ReflectionException
     */
    public function testCanBeConvertWithBuilder(): void {
        $hydrator = new Hydrator();
        $converter = new Converter($hydrator);

        $dto = $converter->convert(PersonDto::class, ['full_name' => 'Alex Brown']);

        $this->assertInstanceOf(PersonDto::class, $dto);
        $this->assertSame('Alex', $dto->fName);
        $this->assertSame('Brown', $dto->lName);
    }
}