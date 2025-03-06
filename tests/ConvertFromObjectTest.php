<?php declare(strict_types=1);

namespace UzDevid\Converter\Tests;

use PHPUnit\Framework\TestCase;
use ReflectionException;
use UzDevid\Converter\Converter;
use UzDevid\Converter\Tests\Support\Abstraction\Airplane;
use UzDevid\Converter\Tests\Support\Abstraction\CarInterface;
use UzDevid\Converter\Tests\Support\Dto\CategoryDto;
use UzDevid\Converter\Tests\Support\Dto\DriverDto;
use UzDevid\Converter\Tests\Support\Dto\OrderDto;
use UzDevid\Converter\Tests\Support\Dto\PersonDto;
use UzDevid\Converter\Tests\Support\Dto\PilotDto;
use UzDevid\Converter\Tests\Support\Dto\ProductDto;
use UzDevid\Converter\Tests\Support\Dto\UserDto;
use UzDevid\Converter\Tests\Support\Model\Category;
use UzDevid\Converter\Tests\Support\Model\Order;
use UzDevid\Converter\Tests\Support\Model\Person;
use UzDevid\Converter\Tests\Support\Model\Product;
use UzDevid\Converter\Tests\Support\Model\User;
use Yiisoft\Hydrator\Hydrator;

class ConvertFromObjectTest extends TestCase {
    /**
     * @throws ReflectionException
     */
    public function testCanBeConvert(): void {
        $hydrator = new Hydrator();
        $converter = new Converter($hydrator);

        $model = new User('Alex', 'Brown');

        $dto = $converter->convert(UserDto::class, $model);

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

        $model = new Product(1, 'Samsung Note 10+', new Category(1, 'Mobile phones'));

        $dto = $converter->convert(ProductDto::class, $model);

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

        $model = new Order(1, 1, 1000, date('Y-m-d H:i:s', $time));

        $dto = $converter->convert(OrderDto::class, $model);

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

        $model = new Person('Alex Brown');

        $dto = $converter->convert(PersonDto::class, $model);

        $this->assertInstanceOf(PersonDto::class, $dto);
        $this->assertSame('Alex', $dto->fName);
        $this->assertSame('Brown', $dto->lName);
    }

    /**
     * @throws ReflectionException
     */
    public function testCanBeConvertPropertyTypeInterface(): void {
        $hydrator = new Hydrator();
        $converter = new Converter($hydrator);

        $dto = $converter->convert(DriverDto::class, ['car' => []]);

        $this->assertInstanceOf(DriverDto::class, $dto);
        $this->assertInstanceOf(CarInterface::class, $dto->car);
    }

    /**
     * @throws ReflectionException
     */
    public function testCanBeConvertPropertyTypeAbstract(): void {
        $hydrator = new Hydrator();
        $converter = new Converter($hydrator);

        $dto = $converter->convert(PilotDto::class, ['airplane' => []]);

        $this->assertInstanceOf(PilotDto::class, $dto);
        $this->assertInstanceOf(Airplane::class, $dto->airplane);
    }
}