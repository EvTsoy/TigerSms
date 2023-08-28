<?php

namespace App\Handlers;


use App\Traits\ExternalRequests;

class DefaultHandler implements ActionHandler
{
    use ExternalRequests;

    public function shouldExecute(string $action): bool
    {
        return true;
    }

    public function execute(array $queryParams): string
    {
        return $this->fetch($queryParams);
    }
}
