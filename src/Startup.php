<?php declare(strict_types=1);

namespace Styx;

use Styx\Logging\Logger;
use Styx\Rendering\Renderer;
use Styx\Routing\Dispatcher;

class Startup
{
    public static function boot(): void
    {
        Renderer::init();

        $route_dispatcher = new Dispatcher();
        try {
            $route_dispatcher->tryMatchRoute();
        } catch(\Exception $e) {
            Logger::error($e);
        }
    }
}