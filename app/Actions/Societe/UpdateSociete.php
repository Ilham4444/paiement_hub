<?php

namespace App\Actions\Societe;

use App\Http\Requests\Societe\UpdateSocieteRequest;
use App\Models\Societe;

class UpdateSociete
{
    public function __invoke(UpdateSocieteRequest $request, Societe $societe)
    {
        $updated = $this->handle($societe, $request->validated());

        return response()->json($updated);
    }

    public function handle(Societe $societe, array $data): Societe
    {
        $societe->update($data);

        return $societe;
    }
}