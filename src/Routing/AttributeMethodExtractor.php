<?php declare(strict_types=1);

namespace Styx\Routing;

use Styx\Logging\Logger;

class AttributeMethodExtractor
{
    /**
     * @param $class
     * @return array<Route>
     * @throws \ReflectionException
     */
    public function extractRoutes($class): array
    {
        $reflection = new \ReflectionClass($class);
        $methods = $reflection->getMethods(\ReflectionMethod::IS_PUBLIC);

        /** @var array<Route> $routes */
        $routes = [];

        if (!empty($methods)) {
            foreach ($methods as $method) {
                $attributes = $method->getAttributes();
                foreach ($attributes as $attribute) {
                    $instance = $attribute->newInstance();
                    $new_route = new Route(
                        $instance->path,
                        $class,
                        $method->getName(),
                        $instance->http_method
                    );

                    $routes[] = $new_route;
                }
            }
        }

        return $routes;
    }
}