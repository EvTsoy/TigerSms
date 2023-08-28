<?php


namespace App\Handlers;

interface ActionHandler {
    public function shouldExecute(string $action): bool;
    public function execute(array $queryParams): string;
}
