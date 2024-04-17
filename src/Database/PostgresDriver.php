<?php declare(strict_types=1);

namespace Styx\Database;

use PgSql\Connection;
use Styx\Logging\Logger;

class PostgresDriver
{
    private static Connection|false $connection;

    public static function init(Config $config)
    {
        self::$connection = pg_connect($config->constructConnectionString());
        if (!self::$connection) {
            throw new \Exception('Could not connect to database');
        }
    }

    public static function getInstance(): false|Connection
    {
        return self::$connection;
    }
}