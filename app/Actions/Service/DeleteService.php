<?php

namespace App\Actions\Service;

use App\Models\Service;

class DeleteService
{
    public function __invoke(Service $service)
    {
        $this->handle($service);

        return response()->json(null, 204);
    }

    public function handle(Service $service): void
    {
        $service->delete();
    }
}