<?php

namespace App\Actions\Association;

use App\Models\Association;

class ShowAssociation
{
    public function __invoke(Association $association)
    {
        return response()->json($this->handle($association));
    }

    public function handle(Association $association): Association
    {
        return $association;
    }
}