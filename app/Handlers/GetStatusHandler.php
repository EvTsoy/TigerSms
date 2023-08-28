<?php

namespace App\Handlers;


use App\Traits\ExternalRequests;

class GetStatusHandler implements ActionHandler
{
    use ExternalRequests;

    public function shouldExecute(string $action): bool
    {
        return $action === 'getNumber';
    }

    public function execute(array $queryParams): string
    {
        return $this->fetch($queryParams);
    }
}
