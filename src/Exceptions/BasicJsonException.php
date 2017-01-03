<?php
namespace Exceptions;

use Slim\Exception\SlimException;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Базовый тип ошибки сервиса. Обеспечивает единую форму общих ошибок
 *
 * Class BasicJsonException
 * @package Exceptions
 */
class BasicJsonException extends SlimException
{
    public function __construct(Request $request, Response $response, $code, $msg, $data = [])
    {
        $error = [
            'status' => 'error',
            'message' => $msg
        ];
        $error = array_merge($data, $error);
        $response = $response->withStatus($code);
        $response = $response->withJson($error);

        parent::__construct($request, $response);
    }

}