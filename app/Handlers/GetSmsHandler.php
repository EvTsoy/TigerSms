<?php

namespace App\Handlers;


use App\Traits\ExternalRequests;

class GetSmsHandler implements ActionHandler
{
    use ExternalRequests;

    public function shouldExecute(string $action): bool
    {
        return $action === 'getSms';
    }

    public function execute(array $queryParams): string
    {
        return $this->fetch($queryParams);
    }
}
