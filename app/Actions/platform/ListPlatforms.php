<?php

namespace App\Actions\Platform;
use App\Http\Resources\Platform\ListPlatformsResource;
use App\Models\Platform;

class ListPlatforms
{
    public function __invoke()
    {
         return ListPlatformsResource::collection($this->handle());
    }

    public function handle()
    {
        return Platform::query()
            ->withCount(['services'])
            ->paginate(15);
    }
}