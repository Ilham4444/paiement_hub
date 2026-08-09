<?php

namespace App\Actions\Objet;

use App\Http\Requests\Objet\StoreObjetRequest;
use App\Models\Objet;

class CreateObjet
{
    public function __invoke(StoreObjetRequest $request)
    {
        $objet = $this->handle($request->validated());

        return response()->json($objet, 201);
    }

    public function handle(array $data): Objet
    {
        return Objet::create($data);
    }
}