<?php

namespace App\Actions\Association;

use App\Models\Association;

class ListAssociations
{
    public function __invoke()
    {
        return response()->json($this->handle());
    }

    public function handle()
    {
        return Association::query()
            ->paginate(15);
    }
}