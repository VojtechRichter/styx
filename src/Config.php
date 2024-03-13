<?php

namespace Styx;

class Config
{
    private ?array $routes;

    public function __construct(
        ?array $routes
    ) {
        if ($routes !== null) {
            $this->routes = $routes;
        }
    }

    public function setRoutes(array $routes): void
    {
        $this->routes = $routes;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }
}