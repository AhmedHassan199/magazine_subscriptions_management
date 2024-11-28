<?php

namespace App\Http\Controllers;

use App\Services\MagazineService;
use App\Http\Requests\StoreMagazineRequest;
use App\Helpers\ApiResponseHelper;
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
        try {
            $magazine = $this->magazineService->create($request->validated());
            return ApiResponseHelper::success('Magazine created successfully', $magazine);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error creating magazine', $e->getMessage());
        }
    }

    public function update($id, StoreMagazineRequest $request)
    {
        try {
            $magazine = $this->magazineService->update($id, $request->validated());
            return ApiResponseHelper::success('Magazine updated successfully', $magazine);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error updating magazine', $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $this->magazineService->delete($id);
            return ApiResponseHelper::success('Magazine deleted successfully');
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error deleting magazine', $e->getMessage());
        }
    }

    public function index()
    {
        try {
            $magazines = $this->magazineService->getAll();
            return ApiResponseHelper::success('Magazines retrieved successfully', $magazines);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error fetching magazines', $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $magazine = $this->magazineService->getById($id);
            return ApiResponseHelper::success('Magazine retrieved successfully', $magazine);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Magazine not found', $e->getMessage());
        }
    }
}
