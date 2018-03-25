<?php

namespace Core;


class App
{
    const CONTROLLER_NAMESPACE = '\\App\\Controller\\';

    public function createResponseFromRequest() {
        $routes = require __DIR__ . '/../app/config/routes.php';

        $pathInfo = $_SERVER['PATH_INFO'];

        if (substr($pathInfo, -1) == '/') {
            $pathInfo = substr($_SERVER['PATH_INFO'], 0, -1);
        }

        foreach ($routes as $route => $rules) {
            if ($route == $pathInfo) {
                $controller = static::CONTROLLER_NAMESPACE . ucfirst($rules['controller']) . 'Controller';
                $method = $rules['method'];

                $response = call_user_func_array([new $controller, $method], $_GET);

                return $response;
            }
        }

        return Helpers::renderNotFound();
    }
}