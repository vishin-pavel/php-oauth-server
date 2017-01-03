<?php
require __DIR__ . '/../vendor/autoload.php';
session_start();

$settings = require __DIR__ . '/../src/Environments/Dev/settings.php';
$errorHandlers = require __DIR__ . '/../src/errorHandlers.php';
$settings = array_merge($settings, $errorHandlers);
$c = new \Slim\Container($settings);
$app = new \Slim\App($c);
require __DIR__ . '/../src/routes.php';
echo $app->run()->getBody();