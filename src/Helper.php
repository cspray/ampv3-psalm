<?php declare(strict_types=1);

namespace Cspray\Ampv3Psalm;

use Psr\Container\ContainerInterface;
use Webmozart\Assert\Assert;
use Webmozart\Assert\InvalidArgumentException;

/**
 * @psalm-api
 */
class Helper {

    /**
     * @template T
     *
     * @param ContainerInterface $container
     * @param class-string<T> $class
     *
     * @return T
     */
    public static function fromContainerUsingWebmozartAssert(ContainerInterface $container, string $class) {
        $object = $container->get($class);
        Assert::isInstanceOf($object, $class);
        return $object;
    }

    /**
     * @template T
     *
     * @param ContainerInterface $container
     * @param class-string<T> $class
     *
     * @return T
     */
    public static function fromContainerUsingInlineAssert(ContainerInterface $container, string $class) {
        $object = $container->get($class);
        self::isInstanceOf($object, $class);
        return $object;
    }

    /**
     * @psalm-pure
     * @psalm-template ExpectedType of object
     * @psalm-param class-string<ExpectedType> $class
     * @psalm-assert ExpectedType $value
     */
    private static function isInstanceOf(mixed $value, string $class): void {
        Assert::isInstanceOf($value, $class);
    }

}