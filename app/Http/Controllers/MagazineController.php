<?php

namespace App\Http\Controllers;

use App\Services\MagazineService;
use App\Http\Requests\StoreMagazineRequest;
use App\Helpers\ApiResponseHelper;
use App\Models\Magazine; // Import the Magazine model
use Illuminate\Http\Request;

class MagazineController extends Controller
{
    protected $magazineService;

    public function __construct(MagazineService $magazineService)
    {
        $this->magazineService = $magazineService;
    }

    public function store(StoreMagazineRequest $request)
    {
        $this->authorize('create', Magazine::class); // Authorization check

        try {
            $magazine = $this->magazineService->create($request->validated());
            return ApiResponseHelper::success('Magazine created successfully', $magazine);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error creating magazine', $e->getMessage());
        }
    }

    public function update($id, StoreMagazineRequest $request)
    {
        $magazine = $this->magazineService->getById($id);
        $this->authorize('update', $magazine); // Authorization check

        try {
            $updatedMagazine = $this->magazineService->update($id, $request->validated());
            return ApiResponseHelper::success('Magazine updated successfully', $updatedMagazine);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error updating magazine', $e->getMessage());
        }
    }

    public function delete($id)
    {
        $magazine = $this->magazineService->getById($id);
        $this->authorize('delete', $magazine); // Authorization check

        try {
            $this->magazineService->delete($id);
            return ApiResponseHelper::success('Magazine deleted successfully');
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error deleting magazine', $e->getMessage());
        }
    }

    public function index()
    {
        $this->authorize('viewAny', Magazine::class); // Authorization check

        try {
            $magazines = $this->magazineService->getAll();
            return ApiResponseHelper::success('Magazines retrieved successfully', $magazines);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error fetching magazines', $e->getMessage());
        }
    }

    public function show($id)
    {
        $magazine = $this->magazineService->getById($id);
        $this->authorize('view', $magazine); // Authorization check

        try {
            return ApiResponseHelper::success('Magazine retrieved successfully', $magazine);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Magazine not found', $e->getMessage());
        }
    }
}
