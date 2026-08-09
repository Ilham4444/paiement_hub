<?php

namespace App\Actions\Societe;

use App\Models\Societe;

class ShowSociete
{
    public function __invoke(Societe $societe)
    {
       return new SocieteResource($this->handle($societe));
    }

    public function handle(Societe $societe): Societe
    {
        return $societe;
    }
}