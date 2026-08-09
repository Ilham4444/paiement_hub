<?php

namespace App\Actions\Service;

use App\Models\Service;

class ShowService
{
    public function __invoke(Service $service)
    {
        return response()->json($this->handle($service));
    }

    public function handle(Service $service): Service
    {
        return $service->load(['platform', 'objets']);
    }
}