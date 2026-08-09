<?php

namespace App\Actions\Platform;

use App\Http\Requests\Platform\StorePlatformRequest;
use App\Models\Platform;

class CreatePlatform
{
    public function __invoke(StorePlatformRequest $request)
    {
        $platform = $this->handle($request->validated());
         //unset($data['logo']);

        if($request->hasFile('logo')) {
            $platform->addMediaFromRequest('logo')->toMediaCollection('logo');
        }

         return response()->json([
            'platform' => $platform,
            'logo' => [
                'original' => $platform->getFirstMediaUrl('logo'),
                'medium' => $platform->getFirstMediaUrl('logo', 'medium'),
                'small' => $platform->getFirstMediaUrl('logo', 'small'),
            ],
        ], 201);
    }

    public function handle(array $data): Platform
    {
        return Platform::create($data);
    }
}