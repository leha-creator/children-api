<?php

require_once "../Classes/Router.php";
require_once "../Classes/Response.php";

use Children\Router;

try {
    Router::get("songs", "SongsController");
    Router::get("users", "UsersController");
} catch (Exception $e) {
    echo $e->getMessage();
}