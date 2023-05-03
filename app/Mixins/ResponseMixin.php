<?php

namespace App\Mixins;

class ResponseMixin {

    public function createdResponse(){
        return function (string $message, $data){
            return response()->json([
                "success" => true,
                "message" => $message,
                "data" => $data,
            ], 201);
        };
    }

    public function successResponse(){
        return function (string $message, $data){
            return response()->json([
                "success" => true,
                "message" => $message,
                "data" => $data,
            ], 200);
        };
    }

    public function notFoundResponse(){
        return function (string $message = "", ?int $status_code = 404){
            return response()->json([
                "success" => false,
                "message" => $message,
                "data" => []
            ], $status_code);
        };
    }

    public function serverErrorResponse() {
        return function (bool $status = false, string $message = "Something went wrong"){
            return response()->json([
                "success" => $status,
                "message" => $message,
            ], 500);
        };
    }
}