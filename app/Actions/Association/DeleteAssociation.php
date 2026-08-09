<?php

namespace App\Actions\Association;

use App\Models\Association;

class DeleteAssociation
{
    public function __invoke(Association $association)
    {
        $this->handle($association);

        return response()->json(null, 204);
    }

    public function handle(Association $association): void
    {
        $association->delete();
    }
}