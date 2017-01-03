<?php
namespace Controllers;

use Slim\Http\Response;

class BaseController
{
    const CONTROLLERS_CONFIG_KEY = 'controllers';

    /**
     * Список обязательных параметров метода в контроллере
     * [
     *     'имя_метода1' =>['параметр1', 'параметр2']
     *     'имя_метода2' =>['параметр3', 'параметр4']
     * ]
     * @return array
     */
    static public function requiredFields()
    {
        return [];
    }

    /**
     * Приводит данные к общему виду ответа
     *
     * @param Response $response
     * @param $data
     *
     * @return Response
     */
    protected function prepareResponse(Response $response, $data)
    {
        $responseData = [
            'status' => 'ok',
            'result' => $data
        ];

        return $response->withJson($responseData);
    }
}