<?php

namespace App\Actions\Article;

use App\Models\Article;

class ListArticles
{
    public function __invoke()
    {
        return response()->json($this->handle());
    }

    public function handle()
    {
        return Article::query()
            ->withCount(['paymentOrders'])
            ->paginate(15);
    }
}