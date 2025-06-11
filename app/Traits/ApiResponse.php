<?php
namespace App\Traits;

trait ApiResponses
{
    protected function success($message,$data=[], $status = 200)
    {
        return response()->json([
            'message' => $message,
            'status' => $status,
            'data' => $data,
        ], $status);
    }

    protected function error($message, $status)
    {
        return response()->json([
            'message' => $message,
            'status' => $status,
        ], $status);
    }

    protected function ok($message,$data=[])
    {
        return $this->success($message,$data, 200);
    }
}