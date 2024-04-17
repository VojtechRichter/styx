<?php declare(strict_types=1);

namespace Styx\Routing;

#[\Attribute(\Attribute::TARGET_METHOD)]
class TriggerRoute
{
    public function __construct(
        public string $path,
        public string $http_method = 'GET'
    )
    {
    }
}