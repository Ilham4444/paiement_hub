<?php

namespace App\Actions\Service;

use App\Models\Service;

class ListServices
{
    public function __invoke()
    {
        return response()->json($this->handle());
    }

    public function handle()
    {
        return Service::query()
            ->withCount(['objets'])
            ->paginate(15);
    }
}