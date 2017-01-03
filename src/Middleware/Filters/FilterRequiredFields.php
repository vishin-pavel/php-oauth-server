<?php
namespace Middleware\Filters;

use Controllers\BaseController;
use Exceptions\BasicJsonException;
use Exceptions\RequiredFieldsJsonException;
use Slim\Exception\SlimException;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Мидлваре-фильтр для проверки наличия обязательных полей.
 * При отсутствии обязательных полей прерывает цепочку выполнения и формероет ответ с ошибкой 400
 * Список обязательнгых полей берестя из метода requiredFields В Соответствующем контроллере.
 * Этот метод по умолчанию реализован в базовом контроллере @see BaseController
 *
 * Class FilterRequiredFields
 * @package Middleware\Filters
 */
class FilterRequiredFields  extends AbstractMiddleware
{
    const REQUIRED_FIELDS_CONFIG_KEY = 'requiredFields';

    /**
     * @param Request $request
     * @param Response $response
     * @param $next
     *
     * @return mixed
     * @throws BasicJsonException
     */
    public function __invoke($request, $response, $next)
    {
        $currentCallable = $request->getAttribute('route')->getCallable();
        if (!is_string($currentCallable)) {
            throw  new BasicJsonException($request, $response, 500, 'Не совместимый тип колбэка');
        }
        $currentCallable = explode(':', $currentCallable); //получаем массив['ClassName', 'MethodName']
        if (!method_exists($currentCallable[0], 'requiredFields')) {
            throw  new BasicJsonException($request, $response, 500,
                'Не реализован список обязаетльных полей в контроллере');
        }
        if (isset($currentCallable[0]::requiredFields()[$currentCallable[1]])) {
            $requiredFields = $currentCallable[0]::requiredFields()[$currentCallable[1]];
            $errorFields = [];
            $params = $request->getParams();
            foreach ($requiredFields as $fieldName) {
                if (!isset($params[$fieldName])) {
                    $errorFields[] = $fieldName;
                }
            }
            if (!empty($errorFields)) {
                throw new RequiredFieldsJsonException($request, $response, $errorFields);
            }
        }
        $response = $next($request, $response);

        return $response;
    }
}