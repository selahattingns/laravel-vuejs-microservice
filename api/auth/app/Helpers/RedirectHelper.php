<?php
namespace App\Helpers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class RedirectHelper {

    /**
     * @param string $message
     * @param null $data
     * @return JsonResponse
     */
    public static function success($message = "", $data = null)
    {
        return self::result($message, $data, 200);
    }

    /**
     * @param $message
     * @return JsonResponse
     */
    public static function unprocessableEntity($message)
    {
        return self::result($message, null, 422);
    }

    /**
     * @param $token
     * @return JsonResponse
     */
    public static function token($token)
    {
        return self::result("", ["token" => $token], 200);
    }

    /**
     * @param string $message
     * @param null $data
     * @param int $statusCode
     * @return JsonResponse
     */
    public static function result($message = "", $data = null, $statusCode = 200)
    {
        return response()->json([
            "message" => $message,
            "data" => $data,
        ], $statusCode);
    }

    /**
     * @param Validator $validator
     */
    public static function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'errors' => $validator->errors(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
