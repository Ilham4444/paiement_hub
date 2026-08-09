<?php

namespace App\Actions\Association;

use App\Http\Requests\Association\UpdateAssociationRequest;
use App\Models\Association;

class UpdateAssociation
{
    public function __invoke(UpdateAssociationRequest $request, Association $association)
    {
        $updated = $this->handle($association, $request->validated());

        return new AssociationResource($updated);
    }

    public function handle(Association $association, array $data): Association
    {
        $association->update($data);

        return $association;
    }
}