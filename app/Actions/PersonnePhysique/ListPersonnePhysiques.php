<?php

namespace App\Actions\PersonnePhysique;
use App\Http\Resources\PersonnePhysique\ListPersonnePhysiquesResource;
use App\Models\PersonnePhysique;

class ListPersonnePhysiques
{
    public function __invoke()
    {
        return ListPersonnePhysiquesResource::collection($this->handle());
    }

    public function handle()
    {
        return PersonnePhysique::query()
            ->paginate(15);
    }
}