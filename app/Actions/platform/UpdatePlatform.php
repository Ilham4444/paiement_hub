<?php

namespace App\Actions\Platform;

use App\Http\Requests\Platform\UpdatePlatformRequest;
use App\Models\Platform;

class UpdatePlatform
{
    public function __invoke(UpdatePlatformRequest $request, Platform $platform)
    {
        $updated = $this->handle($platform, $request->validated());

        return response()->json($updated);
    }

    public function handle(Platform $platform, array $data): Platform
    {
        $platform->update($data);

        return $platform;
    }
}