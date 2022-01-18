<?php

namespace application;

use Attribute;
use ReflectionMethod;

/**
 * Class Route
 * @package application
 */
#[Attribute(Attribute::TARGET_METHOD|Attribute::IS_REPEATABLE)]
class Route
{
    /**
     *
     */
    public const GET = 'GET';

    /**
     *
     */
    public const POST = 'POST';

    /**
     * @var string|null
     */
    private ?string $regularExpression;

    /**é
     * @var ReflectionMethod|null
     */
    private ?ReflectionMethod $reflectionMethod;

    /**
     * Route constructor.
     * @param string $regularExpression
     * @param string[] $httpMethods
     */
    public function __construct(string $regularExpression, private array $httpMethods = [self::GET, self::POST])
    {
        $this->regularExpression = sprintf('#^%s(/|)$#', $regularExpression);
    }

    /**
     * @return string|null
     */
    public function getRegularExpression(): ?string
    {
        return $this->regularExpression;
    }

    /**
     * @return ReflectionMethod|null
     */
    public function getReflectionMethod(): ?ReflectionMethod
    {
        return $this->reflectionMethod;
    }

    /**
     * @param ReflectionMethod $reflectionMethod
     */
    public function setReflectionMethod(ReflectionMethod $reflectionMethod): void
    {
        $this->reflectionMethod = $reflectionMethod;
    }

    /**
     * @return string[]
     */
    public function getHttpMethods(): array
    {
        return $this->httpMethods;
    }
}