<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\StoreUserRequest;
use App\Helpers\ApiResponseHelper;
use App\Models\User; // Import User model
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(StoreUserRequest $request)
    {
        $this->authorize('create', User::class); // Authorization check

        try {
            $user = $this->userService->create($request->validated());
            return ApiResponseHelper::success('User created successfully', $user);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error creating user', $e->getMessage());
        }
    }

    public function update($id, StoreUserRequest $request)
    {
        $user = $this->userService->getById($id);
        $this->authorize('update', $user); // Authorization check

        try {
            $updatedUser = $this->userService->update($id, $request->validated());
            return ApiResponseHelper::success('User updated successfully', $updatedUser);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error updating user', $e->getMessage());
        }
    }

    public function delete($id)
    {
        $user = $this->userService->getById($id);
        $this->authorize('delete', $user); // Authorization check

        try {
            $this->userService->delete($id);
            return ApiResponseHelper::success('User deleted successfully');
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error deleting user', $e->getMessage());
        }
    }

    public function index()
    {
        $this->authorize('viewAny', User::class); // Authorization check

        try {
            $users = $this->userService->getAll();
            return ApiResponseHelper::success('Users retrieved successfully', $users);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error fetching users', $e->getMessage());
        }
    }

    public function show($id)
    {
        $user = $this->userService->getById($id);
        $this->authorize('view', $user); // Authorization check

        try {
            return ApiResponseHelper::success('User retrieved successfully', $user);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('User not found', $e->getMessage());
        }
    }
}
