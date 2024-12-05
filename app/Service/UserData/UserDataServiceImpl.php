<?php

namespace App\Service\UserData;

use App\Models\UserData;
use App\Repository\User\UserData\UserDataRepository;
use Exception;

class UserDataServiceImpl implements UserDataService
{
    protected $userDataRepository;

    public function __construct(UserDataRepository $userDataRepository)
    {
        $this->userDataRepository = $userDataRepository;
    }

    public function updateUserData(array $data, $userId)
    {
        try {
            $updatedData = $this->userDataRepository->fillUpdateById($data, $userId);
            return $updatedData;
        } catch (\Exception $e) {
            throw new Exception(__('validation.message.something_went_wrong'), 500);
        }
    }
}
