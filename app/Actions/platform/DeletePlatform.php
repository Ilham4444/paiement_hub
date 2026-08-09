<?php

namespace App\Actions\Platform;

use App\Models\Platform;

class DeletePlatform
{
    public function __invoke(Platform $platform)
    {
        $this->handle($platform);

        return response()->json(null, 204);
    }

    public function handle(Platform $platform): void
    {
        $platform->delete();
    }
}