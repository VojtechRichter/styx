<?php

class TestController
{
    #[\Styx\Routing\TriggerRoute('/ahoj', 'POST')]
    public function ahoj()
    {
        var_dump(pg_fetch_all(pg_query(\Styx\Database\PostgresDriver::getInstance(), 'select * from posts')));
    }

    public function notFound()
    {
        var_dump('tahle stranka neexistuje');
    }
}