<?php

namespace application/222;

use Attribute;
use Closure;

/**
 * Class Route
 * @package application
 */
#[Attribute(Attribute::TARGET_METHOD|Attribute::IS_REPEATABLE)]
class Route222
{
    /**
     *
     */
    public const GET = 'get';

    /**
     *
     */
    public const POST = 'post';

    /**
     * @var Closure|null
     */
    private ?Closure $closure;

    /**
     * Route constructor.
     * @param string $path
     * @param array $httpMethods
     */
    public function __construct(private string $path, private array $httpMethods = [self::GET, self::POST])
    {
    }

    /**
     * @return Route[]
     */
    public static function getRoutes(): array
    {
        return self::$routes;
    }

    /**
     * @return SubRoute[]
     */
    public function getSubRoutes(): array
    {
        return $this->subRoutes;
    }

    /**
     * @param SubRoute $subRoute
     */
    public function addSubRoute(SubRoute $subRoute): void
    {
        $this->subRoutes[] = $subRoute;
    }
}