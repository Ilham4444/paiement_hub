<?php

namespace App\Actions\Service;

use App\Http\Requests\Service\StoreServiceRequest;
use App\Models\Service;

class CreateService
{
    public function __invoke(StoreServiceRequest $request)
    {
        $service = $this->handle($request->validated());

        return (new ServiceResource($service))
            ->response()
            ->setStatusCode(201);
    }

    public function handle(array $data): Service
    {
        return Service::create($data);
    }
}