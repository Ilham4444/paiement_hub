<?php

namespace App\Actions\PersonnePhysique;

use App\Http\Requests\PersonnePhysique\StorePersonnePhysiqueRequest;
use App\Models\PersonnePhysique;

class CreatePersonnePhysique
{
    public function __invoke(StorePersonnePhysiqueRequest $request)
    {
        $personnePhysique = $this->handle($request->validated());

      return (new PersonnePhysiqueResource($personnePhysique))
            ->response()
            ->setStatusCode(201);
    }

    public function handle(array $data): PersonnePhysique
    {
        return PersonnePhysique::create($data);
    }
}