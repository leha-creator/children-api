<?php

namespace Children\Controllers;

require_once "Controller.php";
require_once "../Models/User.php";

use Children\Controller;
use Children\Models\User;

class UsersController implements Controller
{

    public function getData() : array
    {
        return User::getData();
    }
}