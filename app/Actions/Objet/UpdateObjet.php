<?php

namespace App\Actions\Objet;

use App\Http\Requests\Objet\UpdateObjetRequest;
use App\Models\Objet;

class UpdateObjet
{
    public function __invoke(UpdateObjetRequest $request, Objet $objet)
    {
        $updated = $this->handle($objet, $request->validated());

        return response()->json($updated);
    }

    public function handle(Objet $objet, array $data): Objet
    {
        $objet->update($data);

        return $objet;
    }
}