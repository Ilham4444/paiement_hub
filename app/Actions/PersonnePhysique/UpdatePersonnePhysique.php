<?php

namespace App\Actions\PersonnePhysique;
use App\Http\Resources\PersonnePhysique\UpdatePersonnePhysiqueResource;
use App\Http\Requests\PersonnePhysique\UpdatePersonnePhysiqueRequest;
use App\Models\PersonnePhysique;

class UpdatePersonnePhysique
{
    public function __invoke(UpdatePersonnePhysiqueRequest $request, PersonnePhysique $personnePhysique)
    {
        $updated = $this->handle($personnePhysique, $request->validated());

          return new UpdatePersonnePhysiqueResource($updated);
    }

    public function handle(PersonnePhysique $personnePhysique, array $data): PersonnePhysique
    {
        $personnePhysique->update($data);

        return $personnePhysique;
    }
}