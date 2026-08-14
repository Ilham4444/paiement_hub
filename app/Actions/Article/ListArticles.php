<?php

namespace App\Actions\Article;
use App\Http\Resources\Article\ListArticlesResource;
use App\Models\Article;

class ListArticles
{
    public function __invoke()
    {
       return ListArticlesResource::collection($this->handle());
    }

    public function handle()
    {
        return Article::query()
            ->withCount(['paymentOrders'])
            ->paginate(15);
    }
}