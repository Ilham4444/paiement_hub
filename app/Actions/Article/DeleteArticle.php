<?php

namespace App\Actions\Article;

use App\Models\Article;

class DeleteArticle
{
    public function __invoke(Article $article)
    {
        $this->handle($article);

        return response()->json(null, 204);
    }

    public function handle(Article $article): void
    {
        $article->delete();
    }
}