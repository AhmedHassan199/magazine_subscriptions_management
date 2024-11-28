<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use App\Http\Requests\StoreArticleRequest;
use App\Helpers\ApiResponseHelper;
use App\Models\Article; // Import the Article model
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function store(StoreArticleRequest $request)
    {
        $this->authorize('create', Article::class); // Authorization check

        try {
            $article = $this->articleService->create($request->validated());
            return ApiResponseHelper::success('Article created successfully', $article);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error creating article', $e->getMessage());
        }
    }

    public function update($id, StoreArticleRequest $request)
    {
        $article = $this->articleService->getById($id);
        $this->authorize('update', $article); // Authorization check

        try {
            $updatedArticle = $this->articleService->update($id, $request->validated());
            return ApiResponseHelper::success('Article updated successfully', $updatedArticle);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error updating article', $e->getMessage());
        }
    }

    public function delete($id)
    {
        $article = $this->articleService->getById($id);
        $this->authorize('delete', $article); // Authorization check

        try {
            $this->articleService->delete($id);
            return ApiResponseHelper::success('Article deleted successfully');
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error deleting article', $e->getMessage());
        }
    }

    public function index()
    {
        $this->authorize('viewAny', Article::class); // Authorization check

        try {
            $articles = $this->articleService->getAll();
            return ApiResponseHelper::success('Articles retrieved successfully', $articles);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error fetching articles', $e->getMessage());
        }
    }

    public function show($id)
    {
        $article = $this->articleService->getById($id);
        $this->authorize('view', $article); // Authorization check

        try {
            return ApiResponseHelper::success('Article retrieved successfully', $article);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Article not found', $e->getMessage());
        }
    }
}
