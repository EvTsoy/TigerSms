<?php

namespace App\Handlers;


use App\Traits\ExternalRequests;

class CancelNumberHandler implements ActionHandler
{
    use ExternalRequests;

    public function shouldExecute(string $action): bool
    {
        return $action === 'cancelNumber';
    }

    public function execute(array $queryParams): string
    {
        return $this->fetch($queryParams);
    }
}
