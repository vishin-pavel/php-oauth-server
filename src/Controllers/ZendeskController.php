<?php
namespace Controllers;

use Exceptions\BasicJsonException;
use Slim\Container;
use Zendesk\API\Exceptions\ApiResponseException;
use Zendesk\API\HttpClient as ZendeskAPI;
use Slim\Http\Request as Request;
use Slim\Http\Response as Response;

class ServiceController extends BaseController
{
    /**
     * Создает новый тикет в Zendesk
     *
     * @param Request $request
     * @param Response $response
     * @param $args
     *
     * @return Response
     * @throws BasicJsonException
     */
    public function createTicket(Request $request, Response $response, $args)
    {
        $returnData['foo'] = 'bar';
        $response = $this->prepareResponse($response, $returnData);

        return $response;
    }

    static public function requiredFields()
    {
        return [];
    }

}