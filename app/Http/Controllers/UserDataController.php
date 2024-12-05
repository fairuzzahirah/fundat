<?php
namespace App\Http\Controllers;

use App\Service\UserData\UserDataService;
use App\Service\UserData\UserDataServiceImpl;
use App\Http\Requests\UserData\UserDataRequest; // Import FormRequest
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    protected $userDataService;

    public function __construct(UserDataService $userDataService)
    {
        $this->userDataService = $userDataService;
    }

    public function updateUserData(UpdateUserDataRequest $request) // Ganti Request dengan UpdateUserDataRequest
    {
        // Mendapatkan data yang sudah divalidasi
        $validatedData = $request->validated();

        // Ambil user ID dari autentikasi
        $userId = auth()->user()->id;

        // Update data melalui service
        $updatedUserData = $this->userDataService->updateUserData($validatedData, $userId);

        return response()->json([
            'status' => 'success',
            'data' => $updatedUserData,
        ]);
    }
}
