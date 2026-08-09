<?php

namespace App\Actions\Societe;

use App\Models\Societe;

class ListSocietes
{
    public function __invoke()
    {
         return SocieteResource::collection($this->handle());
    }

    public function handle()
    {
        return Societe::query()
            ->paginate(15);
    }
}