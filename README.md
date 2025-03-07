<p align="center">
    <a href="https://github.com/uzdevid" target="_blank">
        <img src="https://github.com/user-attachments/assets/e29daa5f-ac8f-47aa-b927-40400a6b5626" height="100px" alt="Yii">
    </a>
    <h1 align="center">Object converter</h1>
    <br>
</p>

[![Latest Stable Version](https://poser.pugx.org/uzdevid/converter/v)](https://packagist.org/packages/uzdevid/converter)
[![Total Downloads](https://poser.pugx.org/uzdevid/converter/downloads)](https://packagist.org/packages/uzdevid/converter)
[![Code Coverage](https://codecov.io/gh/uzdevid/converter/branch/master/graph/badge.svg)](https://codecov.io/gh/uzdevid/converter)
[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fyiisoft%2Fvalidator%2Fmaster)](https://dashboard.stryker-mutator.io/reports/github.com/uzdevid/converter/master)
[![type-coverage](https://shepherd.dev/github/uzdevid/converter/coverage.svg)](https://shepherd.dev/github/uzdevid/converter)
[![psalm-level](https://shepherd.dev/github/uzdevid/converter/level.svg)](https://shepherd.dev/github/uzdevid/converter)

## Requirements

- PHP 8.1 or higher.

## Installation

The package could be installed with [Composer](https://getcomposer.org):

```shell
composer require uzdevid/converter
```

## General usage

To convert existing object to other object:

```php
use Yiisoft\Hydrator\Hydrator;
use UzDevid\Converter\Converter;

$hydrator = new Hydrator();
$converter = new Converter($hydrator);

$converter->convert(CarDto::class, $carModel);
```

To convert array to object
```php
use Yiisoft\Hydrator\Hydrator;
use UzDevid\Converter\Converter;

$hydrator = new Hydrator();
$converter = new Converter($hydrator);

$converter->convert(CarDto::class, ['name' => 'Ferrari']);
```