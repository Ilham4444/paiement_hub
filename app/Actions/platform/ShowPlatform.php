<?php

namespace App\Actions\Platform;
use App\Http\Resources\Platform\ShowPlatformResource;
use App\Models\Platform;

class ShowPlatform
{
    public function __invoke(Platform $platform)
    {
       return new ShowPlatformResource($this->handle($platform));
    }

    public function handle(Platform $platform): Platform
    {
        return $platform->load(['services']);
    }
}