<?php

namespace App\Actions\Objet;

use App\Models\Objet;

class ShowObjet
{
    public function __invoke(Objet $objet)
    {
        return new ObjetResource($this->handle($objet));
    }

    public function handle(Objet $objet): Objet
    {
        return $objet->load(['service', 'articles']);
    }
}