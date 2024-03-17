<?php

class IndexController
{
    public function getContent(array $params): void
    {
        \Styx\Rendering\Renderer::getInstance()->render(__DIR__ . '/../index.latte', $params);
    }

    public function notFound(): void
    {
        echo '404 not found';
    }
}