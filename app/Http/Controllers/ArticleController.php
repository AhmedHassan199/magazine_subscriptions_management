<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use App\Http\Requests\StoreArticleRequest;
use App\Helpers\ApiResponseHelper;
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
        try {
            $article = $this->articleService->create($request->validated());
            return ApiResponseHelper::success('Article created successfully', $article);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error creating article', $e->getMessage());
        }
    }

    public function update($id, StoreArticleRequest $request)
    {
        try {
            $article = $this->articleService->update($id, $request->validated());
            return ApiResponseHelper::success('Article updated successfully', $article);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error updating article', $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $this->articleService->delete($id);
            return ApiResponseHelper::success('Article deleted successfully');
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error deleting article', $e->getMessage());
        }
    }

    public function index()
    {
        try {
            $articles = $this->articleService->getAll();
            return ApiResponseHelper::success('Articles retrieved successfully', $articles);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error fetching articles', $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $article = $this->articleService->getById($id);
            return ApiResponseHelper::success('Article retrieved successfully', $article);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Article not found', $e->getMessage());
        }
    }
}
