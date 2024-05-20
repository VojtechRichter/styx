### Styx

## Installation

Styx can be added to a project with composer:
```
composer require vojtechrichter/styx
```

## Usage

As of right now, you can just add the the following call to your index file (or entry point of your app):
```php
\Styx\Startup::boot($config, $db_config);
```

## Example index file

```php
<?php

declare(strict_types=1);

require_once(__DIR__ . '/vendor/autoload');
require_once(__DIR__ . '/env_config.php');

$routes = [
  new \Styx\Routing\Route(
    '/',
    \Example\Controllers\HomeController::class,
    'process',
    'method::any'
  )
];

$styx_config = new \Styx\Config($routes, ENV);

\Styx\Startup::boot($styx_config);
```

## Important note

Styx is being tested, however, I don't guarantee that it's completely bug free.
