<?php declare(strict_types=1);

namespace Styx\Routing;

use Styx\Http\Method;

final class Route
{
    private string $path;
    private string $controller_class_name;
    private Method $method;

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    public function getControllerClassName(): string
    {
        return $this->controller_class_name;
    }

    public function setControllerClassName(string $controller_class_name): void
    {
        $this->controller_class_name = $controller_class_name;
    }

    public function getMethod(): Method
    {
        return $this->method;
    }

    public function setMethod(Method $method): void
    {
        $this->method = $method;
    }
}