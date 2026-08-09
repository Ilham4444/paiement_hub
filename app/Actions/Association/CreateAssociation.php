<?php

namespace App\Actions\Association;

use App\Http\Requests\Association\StoreAssociationRequest;
use App\Models\Association;

class CreateAssociation
{
    public function __invoke(StoreAssociationRequest $request)
    {
        $association = $this->handle($request->validated());

        return response()->json($association, 201);
    }

    public function handle(array $data): Association
    {
        return Association::create($data);
    }
}