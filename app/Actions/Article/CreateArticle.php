<?php

namespace App\Actions\Article;

use App\Http\Requests\Article\StoreArticleRequest;
use App\Models\Article;

class CreateArticle
{
    public function __invoke(StoreArticleRequest $request)
    {
        $article = $this->handle($request->validated());

        return response()->json($article, 201);
    }

    public function handle(array $data): Article
    {
        return Article::create($data);
    }
}