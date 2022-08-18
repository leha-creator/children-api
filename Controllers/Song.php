<?php
namespace Children;

require_once "Controller.php";

use Children\Controller;

class Song implements Controller
{

    public function getData()
    {
        return "Hello";
    }
}