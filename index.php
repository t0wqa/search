<?php

require __DIR__.'/vendor/autoload.php';

$app = new Core\App();

$response = $app->createResponseFromRequest();

$response->send();