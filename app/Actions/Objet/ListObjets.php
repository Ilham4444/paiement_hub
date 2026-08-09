<?php

namespace App\Actions\Objet;

use App\Models\Objet;

class ListObjets
{
    public function __invoke()
    {
        return response()->json($this->handle());
    }

    public function handle()
    {
        return Objet::query()
            ->withCount(['articles'])
            ->paginate(10);
    }
}