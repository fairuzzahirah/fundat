<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class ApiResponse extends JsonResponse
{
    public function __construct($statusResponse = 'success', $message = '', $data = null, $status_code = 200, $headers = [])
    {
        $response = [
            'status' => $statusResponse,
            'message' => $message,
        ];

        if ($data !== null) {
            $response['data'] = $data;
        }

        parent::__construct($response, $status_code, $headers);
    }
}
