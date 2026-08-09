<?php

namespace App\Actions\Objet;

use App\Models\Objet;

class DeleteObjet
{
    public function __invoke(Objet $objet)
    {
        $this->handle($objet);

        return response()->json(null, 204);
    }

    public function handle(Objet $objet): void
    {
        $objet->delete();
    }
}