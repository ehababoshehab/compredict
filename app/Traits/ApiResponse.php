<?php

namespace App\Traits;

use Cookie;
use Illuminate\Http\Exceptions\HttpResponseException;

trait ApiResponse
{
    public function response($message, $statusCode, $data = null)
    {
        if (!$message) {
            throw new HttpResponseException(response()->json(['message' => trans('messages.message_required')], 500));
        }

        $response['message'] = $message;

        if ($data) {
            $response['data'] = $data;
        }

        return response()->json($response, $statusCode);
    }

    public function unauthorized()
    {
        return $this->response('Unauthorized', 401);
    }
}
