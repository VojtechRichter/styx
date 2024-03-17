<?php declare(strict_types=1);

namespace Styx\Routing;

use JetBrains\PhpStorm\NoReturn;

final class Dispatcher
{
    private string $path;
    private array $params = [];
    private string $method;

    /** @var array<Route> */
    private array $routes = [];

    public function __construct() {}

    private function handleRequest(): void
    {
        $request_resource = parse_url($_SERVER['REQUEST_URI']);

        $this->path = $request_resource['path'];
        if ($this->path !== '/') {
            $this->path = rtrim($this->path, '/');
        }

        if (array_key_exists('query', $request_resource)) {
            $this->params = $this->parseRequestParams($request_resource['query']);
        }
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    private function parseRequestParams(string $param_string): array
    {
        $single_params = [];
        $key_value_params = [];
        $param_string = trim($param_string);
        if ($param_string !== '&' && $param_string !== '') {
            $raw_params = explode('&', $param_string);
            if (count($raw_params) > 0) {
                foreach ($raw_params as $param) {
                    $split_kv = explode('=', $param);
                    if (count($split_kv) === 1) {
                        $single_params[] = $split_kv[0];
                    } elseif (count($split_kv) === 2) {
                        $key_value_params[$split_kv[0]] = $split_kv[1];
                    }
                }
            } else {
                return [];
            }
        }

        return array_merge($single_params, $key_value_params);
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function tryMatchRoute(): void
    {
        $this->handleRequest();

        if ($this->routes === []) {
            throw new \Exception('[STYX_EXCEPTION] No routes found');
        } else {
            foreach ($this->routes as $route) {
                if (($route->getPath() === $this->path && $route->getMethod() === $this->method) ||
                    ($route->getPath() === $this->path && $route->getMethod() === 'method::any')) {
                    $this->invokeControllerAndPassControl($route);
                }

                // not a matched route
                switch ($route->getPath()) {
                    case Route::NOT_FOUND:
                    {
                        $this->invokeControllerAndPassControl($route);
                    } break;

                    default:
                    {

                    }
                }
            }
        }
    }

    /**
     * @param array<Route> $routes
     * @return void
     */
    public function registerRoutes(array $routes): void
    {
        $this->routes = $routes;
    }

    #[NoReturn] private function invokeControllerAndPassControl(Route $route): void
    {
        $class_name = $route->getControllerClassName();
        $controller = new $class_name();
        call_user_func_array([$controller, $route->getControllerMethodName()], [$this->params]);

        exit(0);
    }
}