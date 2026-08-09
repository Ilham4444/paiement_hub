<?php

namespace App\Actions\Article;

use App\Http\Requests\Article\UpdateArticleRequest;
use App\Models\Article;

class UpdateArticle
{
    public function __invoke(UpdateArticleRequest $request, Article $article)
    {
        $updated = $this->handle($article, $request->validated());

       return new ArticleResource($updated);
    }

    public function handle(Article $article, array $data): Article
    {
        $article->update($data);

        return $article;
    }
}