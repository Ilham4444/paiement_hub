<?php

namespace App\Actions\Platform;

use App\Http\Requests\Platform\StorePlatformRequest;
use App\Models\Platform;

class CreatePlatform
{
    public function __invoke(StorePlatformRequest $request)
    {
        $platform = $this->handle($request->validated());
      

        if($request->hasFile('logo')) {
            $platform->addMediaFromRequest('logo')->toMediaCollection('logo');
        }

         return (new PlatformResource($platform))
            ->response()
            ->setStatusCode(201);
    }

    public function handle(array $data): Platform
    {
        return Platform::create($data);
    }
}