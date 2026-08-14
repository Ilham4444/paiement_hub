<?php

namespace App\Actions\Service;
use App\Http\Resources\Service\ShowServiceResource;
use App\Models\Service;

class ShowService
{
    public function __invoke(Service $service)
    {
        return new ShowServiceResource($this->handle($service));
    }

    public function handle(Service $service): Service
    {
        return $service->load(['platform', 'objets']);
    }
}