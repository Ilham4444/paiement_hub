<?php

namespace App\Actions\Service;
use App\Http\Resources\Service\UpdateServiceResource;
use App\Http\Requests\Service\UpdateServiceRequest;
use App\Models\Service;

class UpdateService
{
    public function __invoke(UpdateServiceRequest $request, Service $service)
    {
        $updated = $this->handle($service, $request->validated());

        return new UpdateServiceResource($updated);
    }

    public function handle(Service $service, array $data): Service
    {
        $service->update($data);

        return $service;
    }
}