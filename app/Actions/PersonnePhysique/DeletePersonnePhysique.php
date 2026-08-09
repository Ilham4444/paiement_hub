<?php

namespace App\Actions\PersonnePhysique;

use App\Models\PersonnePhysique;

class DeletePersonnePhysique
{
    public function __invoke(PersonnePhysique $personnePhysique)
    {
        $this->handle($personnePhysique);

        return response()->json(null, 204);
    }

    public function handle(PersonnePhysique $personnePhysique): void
    {
        $personnePhysique->delete();
    }
}