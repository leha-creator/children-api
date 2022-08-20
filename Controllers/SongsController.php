<?php

namespace Children\Controllers;

require_once "Controller.php";
require_once "../Models/Song.php";

use Children\Controller;
use Children\Models\Song;

class SongsController implements Controller
{

    public function getData($id = null) : array
    {
        $data = "";

        if (is_null($id)) {
            $data = Song::getData();
        }

        return $data;

    }
}