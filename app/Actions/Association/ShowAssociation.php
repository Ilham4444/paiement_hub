<?php

namespace App\Actions\Association;
use App\Http\Resources\Association\ShowAssociationResource;
use App\Models\Association;

class ShowAssociation
{
    public function __invoke(Association $association)
    {
        return new ShowAssociationResource($this->handle($association));
    }

    public function handle(Association $association): Association
    {
        return $association;
    }
}