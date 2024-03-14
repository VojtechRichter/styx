<?php declare(strict_types=1);

namespace Styx\Routing;

final class Route
{
    private string $path;
    private string $controller_class_name;
    private string $controller_method_name;
    private string|array $method;

    public const NOT_FOUND = '4xx_not_found';

    public function __construct(
        string $path,
        string $controller_class_name,
        string $controller_method_name,
        string|array $method
    ) {
        $this->setPath($path);
        $this->setControllerClassName($controller_class_name);
        $this->setControllerMethodName($controller_method_name);
        $this->setMethod($method);
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $path): void
    {
        if (str_ends_with($path, '/') && strlen($path) > 1) {
            $path = rtrim($path, '/');
        }

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

    public function getControllerMethodName(): string
    {
        return $this->controller_method_name;
    }

    public function setControllerMethodName(string $controller_method_name): void
    {
        $this->controller_method_name = $controller_method_name;
    }

    public function getMethod(): string|array
    {
        return $this->method;
    }

    public function setMethod(string|array $method): void
    {
        $this->method = $method;
    }
}