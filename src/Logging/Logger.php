<?php declare(strict_types=1);

namespace Styx\Logging;

use Styx\Rendering\Renderer;

final class Logger
{
    public static function error(\Exception $e)
    {
        Renderer::getInstance()->render(__DIR__ . '/../Internal/Templates/error.latte', ['message' => $e->getMessage()]);
    }

    public static function warning(string $w)
    {
        Renderer::getInstance()->render(__DIR__ . '/../Internal/Templates/warning.latte', ['message' => $w]);
    }

    public static function dump(mixed $message)
    {
        Renderer::getInstance()->render(__DIR__ . '/../Internal/Templates/dump.latte', ['message' => $message]);
    }

    public static function prod_error()
    {
        Renderer::getInstance()->render(__DIR__ . '/../Internal/Templates/prod_error.latte');
    }
}