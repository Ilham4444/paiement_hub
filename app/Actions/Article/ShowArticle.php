<?php

namespace App\Actions\Article;

use App\Models\Article;

class ShowArticle
{
    public function __invoke(Article $article)
    {
       return new ArticleResource($this->handle($article));
    }

    public function handle(Article $article): Article
    {
        return $article->load(['objet', 'paymentOrders']);
    }
}