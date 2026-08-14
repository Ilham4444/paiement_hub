<?php

namespace App\Actions\PersonnePhysique;
use App\Http\Resources\PersonnePhysique\ShowPersonnePhysiqueResource;
use App\Models\PersonnePhysique;

class ShowPersonnePhysique
{
    public function __invoke(PersonnePhysique $personnePhysique)
    {
      return new ShowPersonnePhysiqueResource($this->handle($personnePhysique));
    }

    public function handle(PersonnePhysique $personnePhysique): PersonnePhysique
    {
        return $personnePhysique;
    }
}