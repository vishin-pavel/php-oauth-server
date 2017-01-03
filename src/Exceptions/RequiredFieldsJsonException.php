<?php
namespace Exceptions;

use Slim\Http\Request;
use Slim\Http\Response;


/**
 * Ошибка, генерируется, когда не хватает обязатеьных полей
 */
class RequiredFieldsJsonException extends BasicJsonException
{
    public function __construct(Request $request, Response $response, $fields)
    {
        parent::__construct(
            $request,
            $response,
            400,
            'Следующие поля являются обязательными: ' . join(', ', $fields),
            ['fields' => $fields]
        );
    }

}