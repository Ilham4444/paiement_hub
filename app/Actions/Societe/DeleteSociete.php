<?php

namespace App\Actions\Societe;

use App\Models\Societe;

class DeleteSociete
{
    public function __invoke(Societe $societe)
    {
        $this->handle($societe);

        return response()->json(null, 204);
    }

    public function handle(Societe $societe): void
    {
        $societe->delete();
    }
}