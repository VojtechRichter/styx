<?php declare(strict_types=1);

namespace Styx;

use Styx\Logging\Logger;
use Styx\Rendering\Renderer;
use Styx\Routing\Dispatcher;

class Startup
{
    public static function boot(Config $config): void
    {
        try {
            Renderer::init();

            $route_dispatcher = new Dispatcher();
            $route_dispatcher->registerRoutes($config->getRoutes());
            $route_dispatcher->tryMatchRoute();
        } catch(\Exception $e) {
            if ($config->isDebugEnvironment()) {
                Logger::error($e);
            } // TODO: else log/report somehow
        }
    }
}