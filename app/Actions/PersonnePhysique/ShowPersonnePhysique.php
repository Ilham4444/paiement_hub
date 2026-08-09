<?php

namespace App\Actions\PersonnePhysique;

use App\Models\PersonnePhysique;

class ShowPersonnePhysique
{
    public function __invoke(PersonnePhysique $personnePhysique)
    {
        return response()->json($this->handle($personnePhysique));
    }

    public function handle(PersonnePhysique $personnePhysique): PersonnePhysique
    {
        return $personnePhysique;
    }
}