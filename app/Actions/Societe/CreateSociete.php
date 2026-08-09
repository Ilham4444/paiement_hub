<?php

namespace App\Actions\Societe;

use App\Http\Requests\Societe\StoreSocieteRequest;
use App\Models\Societe;

class CreateSociete
{
    public function __invoke(StoreSocieteRequest $request)
    {
        $societe = $this->handle($request->validated());

        return response()->json($societe, 201);
    }

    public function handle(array $data): Societe
    {
        return Societe::create($data);
    }
}