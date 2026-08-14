<?php

namespace App\Actions\Objet;
use App\Http\Resources\Objet\ListObjetsResource;
use App\Models\Objet;

class ListObjets
{
    public function __invoke()
    {
        return ListObjetsResource::collection($this->handle());
    }

    public function handle()
    {
        return Objet::query()
            ->withCount(['articles'])
            ->paginate(10);
    }
}