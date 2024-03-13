<?php

class IndexController
{
    public function getContent(): void
    {
        echo 'ahoj';
    }

    public function notFound(): void
    {
        echo '404 not found';
    }
}