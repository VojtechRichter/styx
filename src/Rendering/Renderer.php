<?php declare(strict_types=1);

namespace Styx\Rendering;

use Latte\Engine;

class Renderer
{
    private static Engine $instance;

    public static function init()
    {
        self::$instance = new Engine();
    }

    public static function getInstance(): Engine
    {
        return self::$instance;
    }
}