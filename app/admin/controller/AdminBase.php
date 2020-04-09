<?php


namespace app\admin\controller;


use app\BaseController;

class AdminBase extends BaseController
{
    public function show($status = 1, $message = 'error', $data = [], $httpStatus = 200)
    {
        $result = [
            "status" => $status,
            "message" => $message,
            "data" => $data,
        ];

        return json($result, $httpStatus);
    }
}