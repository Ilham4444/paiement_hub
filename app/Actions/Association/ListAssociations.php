<?php

namespace App\Actions\Association;
use App\Http\Resources\Association\ListAssociationsResource;
use App\Models\Association;

class ListAssociations
{
    public function __invoke()
    {
       return ListAssociationsResource::collection($this->handle());
    }

    public function handle()
    {
        return Association::query()
            ->paginate(15);
    }
}