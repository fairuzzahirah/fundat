<?php

namespace App\Http\Controllers\API\Organizer\Organization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Organizer\Organization\OrganizationEnrollmentRequest;
use App\Http\Resources\Organizer\Organization\OrganizationResource;
use App\Http\Responses\ApiResponse;
use App\Service\Organizer\Organization\OrganizationService;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    protected $organizationService;

    public function __construct(OrganizationService $organizationService)
    {
        $this->organizationService = $organizationService;
    }

    public function index()
    {
        try {
            $organizationList = $this->organizationService->getOrganizationLists();
            return new ApiResponse('success',  __('validation.message.loaded'), OrganizationResource::collection($organizationList), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function store(OrganizationEnrollmentRequest $request, $user_id)
    {
        try {
            return new ApiResponse('success',  __('validation.message.created'), $this->organizationService->postOrganizationEnrollment($request, $user_id), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

    public function update(OrganizationEnrollmentRequest $request)
    {
        try {
            return new ApiResponse('success',  __('validation.message.updated'), $this->organizationService->updateOrganizationData($request), 200);
        } catch (\Exception $exception) {
            return new ApiResponse('error',  $exception->getMessage(), null, $exception->getCode());
        }
    }

}
