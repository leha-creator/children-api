<?php

namespace Children;

use Exception;

class Router
{
    const CONTROLLER_NAMESPACE = "Children\Controllers\\";
    const PATH_TO_CONTROLLERS = "../Controllers/";

    /**
     * @throws Exception
     */

    public static function get($routePATH, $controller)
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $route = explode("/", $routePATH)[0];
            if (explode('/', array_key_first($_GET))[0] == $route) {
                $id = explode('/', array_key_first($_GET))[1];

                $router = new self;
                $data = $router->getController($controller)->getData($id);

                print_r($data);
            }
        }
    }


    /**
     * @throws Exception
     */

    public static function post($routePATH, $controller)
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $router = new self;
            $data = $router->getController($controller)->getData();

            print_r($data);
        }
    }


    /**
     * @throws Exception
     */

    public function getController($controllerName, $params = [])
    {
        $fullPath = self::PATH_TO_CONTROLLERS . $controllerName . ".php";

        if (file_exists($fullPath)) {
            require_once $fullPath;
            $controllerNameWithNamespace = self::CONTROLLER_NAMESPACE . $controllerName;
            return new $controllerNameWithNamespace();
        } else {
            throw new Exception("Not such file : " . $fullPath);
        }
    }

    public static function getRoutePath()
    {
//        $path
    }
}