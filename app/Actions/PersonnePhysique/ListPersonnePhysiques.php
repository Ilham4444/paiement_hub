<?php

namespace App\Actions\PersonnePhysique;

use App\Models\PersonnePhysique;

class ListPersonnePhysiques
{
    public function __invoke()
    {
        return PersonnePhysiqueResource::collection($this->handle());
    }

    public function handle()
    {
        return PersonnePhysique::query()
            ->paginate(15);
    }
}