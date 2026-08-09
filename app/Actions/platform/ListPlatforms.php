<?php

namespace App\Actions\Platform;

use App\Models\Platform;

class ListPlatforms
{
    public function __invoke()
    {
         return PlatformResource::collection($this->handle());
    }

    public function handle()
    {
        return Platform::query()
            ->withCount(['services'])
            ->paginate(15);
    }
}