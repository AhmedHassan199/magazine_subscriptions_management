<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use App\Http\Requests\StoreCommentRequest;
use App\Helpers\ApiResponseHelper;
use App\Models\Comment; // Import the Comment model
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
        $this->authorize('create', Comment::class); // Authorization check

        try {
            $comment = $this->commentService->create($request->validated());
            return ApiResponseHelper::success('Comment created successfully', $comment);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error creating comment', $e->getMessage());
        }
    }

    public function update($id, StoreCommentRequest $request)
    {
        $comment = $this->commentService->getById($id);
        $this->authorize('update', $comment); // Authorization check

        try {
            $updatedComment = $this->commentService->update($id, $request->validated());
            return ApiResponseHelper::success('Comment updated successfully', $updatedComment);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error updating comment', $e->getMessage());
        }
    }

    public function delete($id)
    {
        $comment = $this->commentService->getById($id);
        $this->authorize('delete', $comment); // Authorization check

        try {
            $this->commentService->delete($id);
            return ApiResponseHelper::success('Comment deleted successfully');
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error deleting comment', $e->getMessage());
        }
    }

    public function index()
    {
        $this->authorize('viewAny', Comment::class); // Authorization check

        try {
            $comments = $this->commentService->getAll();
            return ApiResponseHelper::success('Comments retrieved successfully', $comments);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error fetching comments', $e->getMessage());
        }
    }

    public function show($id)
    {
        $comment = $this->commentService->getById($id);
        $this->authorize('view', $comment); // Authorization check

        try {
            return ApiResponseHelper::success('Comment retrieved successfully', $comment);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Comment not found', $e->getMessage());
        }
    }


    public function approveComment($id)
    {
        try {
            $comment = Comment::find($id);
            if ($comment) {
                $comment->is_approved = true;
                $comment->save();
                return ApiResponseHelper::success('Comment approved successfully', $comment);
            } else {
                return ApiResponseHelper::error('Comment not found', 'Comment does not exist.');
            }
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error approving comment', $e->getMessage());
        }
    }

    // Reject a comment
    public function rejectComment($id)
    {
        try {
            $comment = Comment::find($id);
            if ($comment) {
                $comment->is_approved = false;
                $comment->save();
                return ApiResponseHelper::success('Comment rejected successfully', $comment);
            } else {
                return ApiResponseHelper::error('Comment not found', 'Comment does not exist.');
            }
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error rejecting comment', $e->getMessage());
        }
    }
}
