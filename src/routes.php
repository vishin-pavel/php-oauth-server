<?php
/**
 * Роут на создание тикета в зендеск
 */
$app->any('/sevice/path', 'Controllers\ServiceController:foo')
    ->setName('service')
    ->add(new Middleware\Filters\FilterRequiredFields());
