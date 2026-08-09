<?php

namespace App\Actions\Objet;

use App\Http\Requests\Objet\StoreObjetRequest;
use App\Models\Objet;

class CreateObjet
{
    public function __invoke(StoreObjetRequest $request)
    {
        $objet = $this->handle($request->validated());

       return (new ObjetResource($objet))
            ->response()
            ->setStatusCode(201);
    }

    public function handle(array $data): Objet
    {
        return Objet::create($data);
    }
}