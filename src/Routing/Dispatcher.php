<?php declare(strict_types=1);

namespace Styx\Routing;

use Styx\Http\Method;

final class Dispatcher
{
    private string $path;
    private array $params;
    private string $method;

    /** @var array<Route> */
    private array $routes = [];

    public function __construct() {}

    private function handleRequest(): void
    {
        $request_resource = parse_url($_SERVER['REQUEST_URI']);

        $this->path = $request_resource['path'];
        $this->params = [];
        if (array_key_exists('query', $request_resource)) {
            $this->params = $this->parseRequestParams($request_resource['query']);
        }
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    private function parseRequestParams(string $param_string): array
    {
        $new_params = [];
        $param_string = trim($param_string);
        if ($param_string !== '&' && $param_string !== '') {
            $raw_params = explode('&', $param_string);
            if (count($raw_params) > 1) {
                foreach ($raw_params as $param) {
                    $split_kv = explode('=', $param);
                    if (count($split_kv) === 1) {
                        $new_params[] = $split_kv[0];
                    } elseif (count($split_kv) === 2) {
                        $new_params[$split_kv[0]] = $split_kv[1];
                    }
                }
            } else {
                $new_params = $raw_params;
            }
        }

        return $new_params;
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
            // TODO
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
}