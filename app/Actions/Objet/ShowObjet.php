<?php

namespace App\Actions\Objet;
use App\Http\Resources\Objet\ShowObjetResource;
use App\Models\Objet;

class ShowObjet
{
    public function __invoke(Objet $objet)
    {
        return new ShowObjetResource($this->handle($objet));
    }

    public function handle(Objet $objet): Objet
    {
        return $objet->load(['service', 'articles']);
    }
}