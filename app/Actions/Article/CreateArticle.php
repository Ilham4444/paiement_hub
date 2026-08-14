<?php

namespace App\Actions\Article;
use App\Http\Resources\Article\ListArticlesResource;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Models\Article;

class CreateArticle
{
    public function __invoke(StoreArticleRequest $request)
    {
        $article = $this->handle($request->validated());

        return (new ListArticlesResource($article))
            ->response()
            ->setStatusCode(201);
    }

    public function handle(array $data): Article
    {
        return Article::create($data);
    }
}