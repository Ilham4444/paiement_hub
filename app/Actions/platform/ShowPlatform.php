<?php

namespace App\Actions\Platform;

use App\Models\Platform;

class ShowPlatform
{
    public function __invoke(Platform $platform)
    {
       return new PlatformResource($this->handle($platform));
    }

    public function handle(Platform $platform): Platform
    {
        return $platform->load(['services']);
    }
}