<?php

namespace App\Actions\Platform;

use App\Models\Platform;

class ListPlatforms
{
    public function __invoke()
    {
        return response()->json($this->handle());
    }

    public function handle()
    {
        return Platform::query()
            ->withCount(['services'])
            ->paginate(15);
    }
}