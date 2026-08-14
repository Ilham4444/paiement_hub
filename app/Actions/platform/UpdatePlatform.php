<?php

namespace App\Actions\Platform;
use App\Http\Resources\Platform\UpdatePlatformResource;
use App\Http\Requests\Platform\UpdatePlatformRequest;
use App\Models\Platform;

class UpdatePlatform
{
    public function __invoke(UpdatePlatformRequest $request, Platform $platform)
    {
        $updated = $this->handle($platform, $request->validated());

        if ($request->hasFile('logo')) {
            $updated->clearMediaCollection('logo'); 
            $updated->addMediaFromRequest('logo')->toMediaCollection('logo');
        }
 
        return new UpdatePlatformResource($updated);
    }

    public function handle(Platform $platform, array $data): Platform
    {
        $platform->update($data);

        return $platform;
    }
}