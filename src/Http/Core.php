<?php declare(strict_types=1);

namespace Styx\Http;

use JetBrains\PhpStorm\NoReturn;

class Core
{
    #[NoReturn] public static function edirect(string $path, int $status_code = StatusCode::REDIRECT_TEMPORARY): void
    {
        header('Location: ' . $path, true, $status_code);
        exit(0);
    }
}