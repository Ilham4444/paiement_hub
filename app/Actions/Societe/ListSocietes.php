<?php

namespace App\Actions\Societe;
use App\Http\Resources\Societe\ListSocietesResource;
use App\Models\Societe;

class ListSocietes
{
    public function __invoke()
    {
         return ListSocietesResource::collection($this->handle());
    }

    public function handle()
    {
        return Societe::query()
            ->paginate(15);
    }
}