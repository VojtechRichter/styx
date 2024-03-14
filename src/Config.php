<?php

namespace Styx;

class Config
{
    private ?array $routes;
    private bool $dev_env;

    public function __construct(
        ?array $routes,
        bool $dev_env = true
    ) {
        if ($routes !== null) {
            $this->routes = $routes;
        }

        $this->dev_env = $dev_env;
    }

    public function setRoutes(array $routes): void
    {
        $this->routes = $routes;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function isDebugEnvironment(): bool
    {
        return $this->dev_env;
    }
}