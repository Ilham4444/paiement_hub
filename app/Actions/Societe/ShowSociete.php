<?php

namespace App\Actions\Societe;
use App\Http\Resources\Societe\ShowSocieteResource;
use App\Models\Societe;

class ShowSociete
{
    public function __invoke(Societe $societe)
    {
       return new ShowSocieteResource($this->handle($societe));
    }

    public function handle(Societe $societe): Societe
    {
        return $societe;
    }
}