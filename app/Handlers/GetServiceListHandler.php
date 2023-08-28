<?php

namespace App\Handlers;


use App\Traits\ExternalRequests;

class GetServiceListHandler implements ActionHandler
{
    use ExternalRequests;

    public function shouldExecute(string $action): bool
    {
        return $action === 'getServiceList';
    }

    public function execute(array $queryParams): string
    {
        return $this->fetch($queryParams);
    }
}
