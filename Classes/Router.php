<?php

namespace Children;

use Exception;

class Router
{
    private $baseURL;
    private $path;
    private $routes = array();
    const BASE_NAMESPACE = "Children\\";

    function __construct($baseURL = "http://children-api/api/")
    {
        $this->$baseURL = $baseURL;
    }

    /**
     * @throws Exception
     */

    public function setBase($baseURL)
    {
        if (filter_var($baseURL, FILTER_VALIDATE_URL)) {
            $this->$baseURL = $baseURL;
        } else {
            throw new Exception("Invalid URL");
        }
    }

    /**
     * @throws Exception
     */

    public static function get($routePATH, $controller)
    {
        $router = new self;
        $data = $router->getController($controller)->getData();

        echo $data;
    }

    /**
     * @throws Exception
     */

    public function getController($controllerName, $params = [])
    {
        $fullPath = "../Controllers/" . $controllerName . ".php";

        if (file_exists($fullPath)) {
            require_once $fullPath;
            $controllerNameWithNamespace = self::BASE_NAMESPACE . $controllerName;
            return new $controllerNameWithNamespace();
        } else {
            throw new Exception("Not such file : " . $fullPath);
        }

    }
}