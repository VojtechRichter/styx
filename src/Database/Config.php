<?php declare(strict_types=1);

namespace Styx\Database;

class Config
{
    private string $host;
    private int $port;
    private string $dbname;
    private string $user;
    private string $password;

    public function __construct(
        string $host,
        int $port,
        string $dbname,
        string $user,
        string $password
    )
    {
        $this->host = $host;
        $this->port = $port;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->password = $password;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function setHost(string $host): void
    {
        $this->host = $host;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function setPort(int $port): void
    {
        $this->port = $port;
    }

    public function getDbname(): string
    {
        return $this->dbname;
    }

    public function setDbname(string $dbname): void
    {
        $this->dbname = $dbname;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function setUser(string $user): void
    {
        $this->user = $user;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function constructConnectionString(): string
    {
        $connection_string = 'host=' . $this->host . ' port=' . $this->port.
            ' dbname=' . $this->dbname . ' user=' . $this->user . ' password=' . $this->password;

        return $connection_string;
    }
}