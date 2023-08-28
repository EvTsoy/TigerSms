<?php

namespace App\Services;

use App\Handlers\CancelNumberHandler;
use App\Handlers\DefaultHandler;
use App\Handlers\GetCountryListHandler;
use App\Handlers\GetNumberHandler;
use App\Handlers\GetServiceListHandler;
use App\Handlers\GetSmsHandler;
use App\Handlers\GetStatusHandler;
use Illuminate\Http\Request;

class PostbackService
{
    public function __construct(
        private GetNumberHandler $getNumberHandler,
        private GetSmsHandler $getSmsHandler,
        private CancelNumberHandler $cancelNumberHandler,
        private GetStatusHandler $getStatusHandler,
        private GetCountryListHandler $getCountryListHandler,
        private GetServiceListHandler $getServiceListHandler,
        private DefaultHandler $defaultHandler,
    ) {}

    public function execute(Request $request)
    {
        $action = $request->query('action');
        $queryParams = $request->all();

        foreach ($this->getHandlers() as $handler) {
            if ($handler->shouldExecute($action)) {
                return $handler->execute($queryParams);
            }
        }
    }

    private function getHandlers(): array
    {
        return [
            $this->getNumberHandler,
            $this->getSmsHandler,
            $this->cancelNumberHandler,
            $this->getStatusHandler,
            $this->getCountryListHandler,
            $this->getServiceListHandler,
            $this->defaultHandler
        ];
    }
}
