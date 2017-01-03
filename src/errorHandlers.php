<?php
return [
    /**
     * Основной обрабоотчик ошибок. Считает, что принятый формат ошибки уже был соблюден за
     * счет использования класс @see BasicJsonException
     */
    'errorHander' => function ($c) {
        return function (\Slim\Http\Request $request, \Slim\Http\Response $response, $exception) use ($c) {
            return $response;
        };
    },

    /**
     * Формирует стандартный ответ 404
     */
    'notFoundHandler' => function ($c) {
        return function (\Slim\Http\Request $request, \Slim\Http\Response $response) use ($c) {
            $responseData = [
                'status' => 'error',
                'message' => 'Page not found'
            ];

            return $response
                ->withStatus(404)
                ->withHeader('Content-Type', 'application/json')
                ->write(json_encode($responseData));
        };
    },
    /**
     * Формирует стандартный ответ 405
     */
    'notAllowedHandler' => function ($c) {
        return function (\Slim\Http\Request $request, \Slim\Http\Response $response, $methods) use ($c) {
            $responseData = [
                'status' => 'error',
                'message' => 'Method must be one of: ' . implode(', ', $methods)
            ];

            return $response
                ->withStatus(405)
                ->withHeader('Allow', implode(', ', $methods))
                ->withHeader('Content-type', 'application/json')
                ->write(json_encode($responseData));
        };
    }
];