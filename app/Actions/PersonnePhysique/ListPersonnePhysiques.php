<?php

namespace App\Actions\PersonnePhysique;

use App\Models\PersonnePhysique;

class ListPersonnePhysiques
{
    public function __invoke()
    {
        return response()->json($this->handle());
    }

    public function handle()
    {
        return PersonnePhysique::query()
            ->paginate(15);
    }
}