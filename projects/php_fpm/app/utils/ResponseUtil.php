<?php
// PHP8.3
declare(strict_types=1);

use Phalcon\Http\Response;

class ResponseUtil
{
    public const ENCODE_OPTION = JSON_HEX_TAG | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE;

    public static function setup200Response(Response $response, null | bool | int | string | array | object $result): Response
    {
        $response->setRawHeader('HTTP/1.1 200 OK');
        $response->setRawHeader('Content-Type: application/json');
        $response->setRawHeader('Cache-Control: no-cache');
        $json = json_encode($result, ResponseUtil::ENCODE_OPTION);
        $response->setContentLength(strlen($json));
        $response->setContent($json);
        return $response;
    }

    public static function create400BadRequest(?ErrorDto $errorDto = null): Response
    {
        $response = new Response();
        $response->setStatusCode(400);
        $response->setRawHeader('Content-Type: application/json');
        $response->setRawHeader('Cache-Control: no-cache');
        $result = new class
        {
            public $error = null;
        };
        $result->error = $errorDto ?? new ErrorDto();
        $json = json_encode($result, ResponseUtil::ENCODE_OPTION);
        $response->setContentLength(strlen($json));
        $response->setContent($json);
        return $response;
    }

    public static function create403Forbidden(): Response
    {
        $response = new Response();
        $response->setStatusCode(403);
        $response->setContent('403 Forbidden');
        return $response;
    }

    public static function create500InternalServerError(string $debugMessage = ""): Response
    {
        $response = new Response();
        $response->setStatusCode(500);
        $response->setContent($debugMessage);
        return $response;
    }
}
