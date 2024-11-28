<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use App\Http\Requests\StoreCommentRequest;
use App\Helpers\ApiResponseHelper;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function store(StoreCommentRequest $request)
    {
        try {
            $comment = $this->commentService->create($request->validated());
            return ApiResponseHelper::success('Comment created successfully', $comment);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error creating comment', $e->getMessage());
        }
    }

    public function update($id, StoreCommentRequest $request)
    {
        try {
            $comment = $this->commentService->update($id, $request->validated());
            return ApiResponseHelper::success('Comment updated successfully', $comment);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error updating comment', $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $this->commentService->delete($id);
            return ApiResponseHelper::success('Comment deleted successfully');
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error deleting comment', $e->getMessage());
        }
    }

    public function index()
    {
        try {
            $comments = $this->commentService->getAll();
            return ApiResponseHelper::success('Comments retrieved successfully', $comments);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error fetching comments', $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $comment = $this->commentService->getById($id);
            return ApiResponseHelper::success('Comment retrieved successfully', $comment);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Comment not found', $e->getMessage());
        }
    }
}
