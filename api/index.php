<?php

require_once "../Classes/Router.php";

use Children\Router;

try {
    Router::get("songs", "SongsController");
} catch (Exception $e) {
    echo $e->getMessage();
}
