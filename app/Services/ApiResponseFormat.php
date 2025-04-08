<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Response;

class ApiResponseFormat
{


    public static function success($data,$message,$statusCode=Response::HTTP_OK)
    {
        return response()->json([
            "Status"    =>  true,
            "Data"      =>  $data,
            "Message"   => $message,

            ],$statusCode );
    }

    public static function error($data,$message , $response_code=Response::HTTP_UNPROCESSABLE_ENTITY)
    {
        return response()->json([
            "Status"    =>  false,
            "Errors"    =>  $data,
            "Message"    => $message,
            ],$response_code);
    }


}
