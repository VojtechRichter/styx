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
}