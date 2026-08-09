<?php

namespace App\Actions\Association;

use App\Models\Association;

class ListAssociations
{
    public function __invoke()
    {
       return AssociationResource::collection($this->handle());
    }

    public function handle()
    {
        return Association::query()
            ->paginate(15);
    }
}