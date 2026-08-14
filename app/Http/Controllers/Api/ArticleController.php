<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Actions\Article\ListArticles;
use App\Actions\Article\ShowArticle;
use App\Actions\Article\CreateArticle;
use App\Actions\Article\UpdateArticle;
use App\Actions\Article\DeleteArticle;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(ListArticles $action){
             return $action();
    }

    public function show(ShowArticle $action, Article $article){
                return $action($article);

    }
    public function store(StoreArticleRequest $request, CreateArticle $action){
        return $action($request);

    }

    public function update(UpdateArticleRequest $request, UpdateArticle $action, Article $article){
        return $action($request, $article);
    }
    
    public function destroy(DeleteArticle $action, Article $article){
        return $action($article);
    }
}
